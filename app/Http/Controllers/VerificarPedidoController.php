<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class VerificarPedidoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function verificar() {
        $cart = session('cart');
        if (empty($cart)) {
            session()->flash('vacio', true);
            return redirect()->route('showCart');
        }
        $cantidad_productos = 0;
        foreach ($cart as $producto) {
            $cantidad_productos += $producto['cantidad'];
        }

        // Hago descuento por el codigo ingresado por usuario, este codigo ya ha sido verificado por la funcion verificarCodigo
        $total_del_pedido = session('total_del_pedido');
        $descuento_peso   = session('descuento_peso') ? session('descuento_peso') : 0;

        $total_pagar = $total_del_pedido - $descuento_peso;
        session()->put('total_pagar', $total_pagar);
        $total_pagar = session('total_pagar');

        // Obtener los tipos de entregas de pedidos que estan disponibles

        $tipo_entregas = App\Envio::select('id', 'envio_metodo')->get();

        return view('verificacion', 
            compact(
                'cart',
                'cantidad_productos',
                'tipo_entregas',
                'total_del_pedido',
                'descuento_peso',
                'total_pagar'
            )
        );
    }

    // VERIFICAR CODIGO DE DESCUENTO

    public function verificarCodigo(Request $request) {
        // Creo una variable para guardar el código usado, esto se hace para evitar que se vuelva a usar el mismo codigo dos veces y para llevar un conteo de cuantos codigos se han usado ya que solo se permite uno solo

        // Obtener y formatear cadena codigo de descuento
        $codigo_usuario = strtoupper(trim($request->input('codigo_descuento')));
        // dd($codigo_usuario);
        // Redireccionar a pagina verificar en caso de que el codigo ya se haya usado
        if($this->codigoUsado()) {
            redirect()->route('verificar');
        }

        // Verifico existencia en la tabla
        $existe = $this->codigoExisteEnTabla($codigo_usuario);
        if(!$existe) {
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Verificar si código no se ha vencido
        if($this->codigoVencido($existe)) {
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Verificar numero de cangeos
        if( !$this->codigoCanjeable($existe) ) {
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Verificar monto minimo del carrito para ser usado
        if( !$this->montoMinimo($existe) ) { // returna true en caso de exito, si no false
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }
        // Verificar si el codigo de descuento solo se puede aplicar a una categoria de producto en especifico
        if(!$this->verificarCategoria($existe)) {
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Si todo esta bien hasta aquí...
        // Guardar el id del codigo usado para insertarlo luego en la tabla del pedido
        session()->put('promocion_id', $existe[0]->id);
        $promo_tipo  = $existe[0]->promo_tipo;
        $promo_costo = $existe[0]->promo_costo;

        $total_del_pedido    = session('total_del_pedido');
        // Realizar descuento
        $this->hacer_descuento($total_del_pedido, $promo_tipo, $promo_costo);

        // Guardar código en la sesion codigos_usados
        session()->put('codigos_usados', $codigo_usuario);

        // Guardar la notificacion del descuento a true
        session()->put('descuento_realizado', true);

        return redirect()->route('verificar')->with('noticia_descuento', 'Ha recibido un descuento de $' . number_format(session('descuento_peso'), 0, ',', '.'));
    }

    // Verifico si hay algun código usado ya
    private function codigoUsado() {
        if(session('codigos_usados') > 1 ) {
            session()->flash('Errors', 'No puede usar mas de un código de descuento');
            return true; redirect()->route('verificar');
        }
    }

    // Verificar si codigo existe en la tabla
    private function codigoExisteEnTabla($codigo_usuario) {
        $existe = App\Promocion::where('promo_nombre', $codigo_usuario)->get();
        if ($existe->isEmpty()) {
            session()->flash('Errors', 'Código inválido');
            return false;
        }
        return $existe;
    }

    // Verificar si codigo ha vencido
    private function codigoVencido($existe) {
        $fecha_limite_codigo = $existe[0]->promo_final;
        date_default_timezone_set('America/Bogota');
        $fecha_actual = date('Y-m-d H:i:s');

        if($fecha_actual > $fecha_limite_codigo) {
            // Codigo vencído
            session()->flash('Errors', 'Este código ha expirado, intente con otro');
            return true;
        }
        return false;
    }

    // Verificar numero de canjeo
    private function codigoCanjeable($existe) {
        // Si esta vigente, verifico numero de canjeos en otros pedidos
        $canjeos_permitidos = $existe[0]->promo_numero_canjeo;
        $codigo_usados = App\Pedido::where('promocion_id', $existe[0]->id)
                                    ->get()
                                    ->count('promocion_id');

        if ($codigo_usados >= $canjeos_permitidos) {
            // Numero de canjeos excedido
            session()->flash('Errors', 'Este código ya no esta disponible');
            return false;
        }
        return true;
    }

    // Verificar monto minimo
    private function montoMinimo($existe) {
        // Minimo exigido por el codigo de promoción
        $promo_minimo_pedido = floatval($existe[0]->promo_minimo_pedido); // formtato - 1000.0
        // Monoto del pedido
        $total_del_pedido    = session('total_del_pedido'); // formtato - 1000.0

        if ($total_del_pedido >= $promo_minimo_pedido) {
            // Monto minimo permitido
            return true;
        }else {
            // Monto minimo No permitido
            session()->flash('Errors', 'Se requiere un mínimo de $' . number_format($promo_minimo_pedido, 0, '', '.') . ' para utilizar este código');
            return false;
        }
    }

    // Verificar si el codigo de descuento solo se puede aplicar a una categoria de producto en especifico
    // Los Codigos de descuento que pertenezcan a una categoria de producto especifo, solo se pueden aplicar a esa categoria de productos, ademas el carrito solo debe tener un producto agregado.
    private function verificarCategoria($existe) {
        $cart =session('cart');
        $categoria_id = $existe[0]->categoria_id;
        $categoria_nombre = App\Categoria::where('id', $categoria_id)->value('categoria_nombre');

        if($categoria_id) {
            // Verificar cantidad de productos agregado
            if(count($cart) == 1) {
                // Verificar categoria del producto en el carrito
                $producto_id = key($cart);
                $producto_categoria_id = App\Producto::where('id', $producto_id)->value('categoria_id');
                
                // Deben ser iguales para que el descuento se realize
                if($producto_categoria_id == $categoria_id) {
                    return true;
                }else {
                    session()->flash('Errors', 'Código disponible solo para productos de la categoria ' . $categoria_nombre);
                    return false;
                }
            }else {
                dd('productos: ' . count($cart) . ' != ' . 1);
                session()->flash('Errors', 'Código disponible solo para un producto a la vez');
                return false;
            }
        }else {
            return false;
        }
    }

    // Realizar descuento
    public function hacer_descuento($monto, $tipo, $costo) {
        if ($tipo == 'descuento%') {
            $descuento = $monto * ($costo / 100);
            session()->put('descuento_peso', $descuento);
        }
        elseif ($tipo == 'peso') {
            $descuento = $costo;
            session()->put('descuento_peso', $descuento);
        }
    }
}
