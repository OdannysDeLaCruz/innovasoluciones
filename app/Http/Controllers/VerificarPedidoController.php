<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;
class VerificarPedidoController extends Controller
{
    private $direccion_defecto;
    private $direccion_nueva;
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct() {
        $this->middleware('auth');

        $this->direccion_defecto = [];
        $this->direccion_nueva = [];

        // Session para almacenar la direccion por defecto del usuario
        if(!session()->has('direccion_defecto')) {
            session()->put('direccion_defecto', []);            
        }
        // session para almacenar la dirección nueva que digite el usuario
        if(!session()->has('direccion_nueva')) {
            session()->put('direccion_nueva', []);            
        }

    }
    
    public function verificar() {
        // dd(session('direccion_defecto'), session('direccion_nueva'));
        $cart = session('cart');
        // Agregar datos de direccion del usuario a una variable de session 
        // Se agragará la direccion con la que se registro por defecto

        // Obtener direccion principal de envio del usuario
        $this->direccion_defecto['usuario_calle']      = Auth::user()->direccion()->value('calle');
        $this->direccion_defecto['usuario_numero_calle']  = Auth::user()->direccion()->value('numero');
        $this->direccion_defecto['usuario_barrio']     = Auth::user()->direccion()->value('barrio');
        $this->direccion_defecto['usuario_ciudad']     = Auth::user()->direccion()->value('ciudad');
        $this->direccion_defecto['usuario_departamento']  = Auth::user()->direccion()->value('departamento');
        $this->direccion_defecto['usuario_distrito']    = Auth::user()->direccion()->value('distrito');
        $this->direccion_defecto['usuario_pais']        = Auth::user()->direccion()->value('pais');
        $this->direccion_defecto['usuario_cod_postal']  = Auth::user()->direccion()->value('codigo_postal');

        $direccion_defecto_usuario = session('direccion_defecto');
        $direccion_defecto_usuario = $this->direccion_defecto;
        session()->put('direccion_defecto', $direccion_defecto_usuario);
        $direccion_defecto_usuario = session('direccion_defecto');

        // Obtener direccion nueva de envio
        $direccion_nueva_pedido = session('direccion_nueva');
        
        // Verificar que dirección existe para envio del pedido
        if($direccion_nueva_pedido == []) {
            $direccion = $direccion_defecto_usuario;
        }else {
            $direccion = $direccion_nueva_pedido;
        }

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

        // return view('productos');  
        return view('verificacion', compact('cart','direccion', 'cantidad_productos','tipo_entregas','total_del_pedido','descuento_peso','total_pagar'));
    }

    // VERIFICAR CODIGO DE DESCUENTO

    public function verificarCodigo(Request $request) {
        // Creo una variable para guardar el código usado, esto se hace para evitar que se vuelva a usar el mismo codigo dos veces y para llevar un conteo de cuantos codigos se han usado ya que solo se permite uno solo

        // Obtener y formatear cadena codigo de descuento
        $codigo_usuario = strtoupper(trim($request->input('codigo_descuento')));
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

        $total_del_pedido = session('total_del_pedido');
        // dd($total_del_pedido);
        // Realizar descuento
        $descuento = $this->hacer_descuento($total_del_pedido, $promo_tipo, $promo_costo);

        if($descuento) {
            // Guardar código en la sesion codigos_usados
            session()->put('codigos_usados', $codigo_usuario);
            // Guardar la notificacion del descuento a true
            session()->put('descuento_realizado', true);
        
            return redirect()->route('verificar')->with('noticia_descuento', 'Ha recibido un descuento de $' . number_format(session('descuento_peso'), 0, ',', '.'));
        }
    }

    // Verifico si hay algun código usado ya
    private function codigoUsado() {
        if(session('codigos_usados') > 1 ) {
            session()->flash('Errors', 'No puede usar mas de un código de descuento');
            return true; 
            // redirect()->route('verificar');
        }
        return false;
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
        $codigo_usados = App\Pedido::where('promocion_id', $existe[0]->id)->count('promocion_id');

        if ($codigo_usados >= $canjeos_permitidos) {
            // Numero de canjeos excedido
            session()->flash('Errors', 'Este código ya no esta disponible');
            return false;
        }
        // dd($codigo_usados);
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
        $cart = session('cart');
        $codigo_categoria_id = $existe[0]->categoria_id;
        // dd($categoria_id);

        // Si este codigo tiene categoria_id, entonces aplicar codigo al producto en el pedido.
        if($codigo_categoria_id != null) {
            $codigo_categoria_nombre = App\Categoria::where('id', $codigo_categoria_id)->value('categoria_nombre');
            $cantidad_producto = $this->obtener_cantidad_productos($cart);
            // dd($cantidad_producto);

            if($cantidad_producto == 1) {

                $producto_id = key($cart); // Devuelve el id del unico producto que esta en el carriro
                $producto_categoria_id = App\Producto::where('id', $producto_id)->value('categoria_id');
                
                // Las categorias deben ser iguales para que el descuento se realize
                if($producto_categoria_id == $codigo_categoria_id) {
                    return true;
                }else {
                    session()->flash('Errors', 'Código disponible solo para productos de la categoria ' . $codigo_categoria_nombre);
                    return false;
                }
            }else {
                session()->flash('Errors', 'Código disponible solo para un producto a la vez');
                return false;
            }
        }
        // Si este codigo tiene categoria_id en null, retorbar true para  hacer descuento al pedido completo
        else {            
            return true;
        }
    }

    // Realizar descuento, almacena el descuento en una variable de sesion
    private function hacer_descuento($total_pedido, $promo_tipo, $promo_costo) {
        if ($promo_tipo == '%') {
            $descuento = $total_pedido * ($promo_costo / 100);
            session()->put('descuento_peso', $descuento);
            return true;
        }
        elseif ($promo_tipo == '$') {
            $descuento = $promo_costo;
            session()->put('descuento_peso', $descuento);
            return true;
        }
    }

    // Cambiar direccion de envio
    public function cambiar_direccion_envio(Request $request) {

        if($request->ajax()) {

            $v = \Validator::make($request->all(), [
                "calle"    => 'required|string',
                "numero"   => 'required|string',
                "barrio"   => 'required|string',
                "ciudad"   => 'required|string',
                "departamento"  => 'nullable|string',
                "distrito" => 'nullable|string',
                "pais"     => 'required|string',
                "codigo_postal" => 'nullable|integer'
            ]);
            // Si hay errores
            if($v->fails()) {
                $dataErrors['calle']  = $v->errors()->first('calle');
                $dataErrors['numero'] = $v->errors()->first('numero');
                $dataErrors['barrio'] = $v->errors()->first('barrio');
                $dataErrors['ciudad'] = $v->errors()->first('ciudad');
                $dataErrors['departamento'] = $v->errors()->first('departamento');
                $dataErrors['distrito'] = $v->errors()->first('distrito');
                $dataErrors['pais']     = $v->errors()->first('pais');
                $dataErrors['codigo_postal'] = $v->errors()->first('codigo_postal');

                echo json_encode(array(
                    'status' => 'Errors',
                    'data' => $dataErrors
                ));
            }else {
                // Si no hay errores, obtenemos los nuevos datos de direccion de envio y los asignamos a el array direccion

                $this->direccion_nueva['usuario_calle'] = $request->calle;
                $this->direccion_nueva['usuario_numero_calle'] = $request->numero;
                $this->direccion_nueva['usuario_barrio'] = $request->barrio;
                $this->direccion_nueva['usuario_ciudad'] = $request->ciudad;
                $this->direccion_nueva['usuario_departamento'] = $request->departamento;
                $this->direccion_nueva['usuario_distrito'] = $request->distrito;
                $this->direccion_nueva['usuario_pais'] = $request->pais;
                $this->direccion_nueva['usuario_cod_postal'] = $request->codigo_postal;

                $direccion_nueva_pedido = session('direccion_nueva');
                $direccion_nueva_pedido = $this->direccion_nueva;
                session()->put('direccion_nueva', $direccion_nueva_pedido);

                echo json_encode(array(
                    'status' => 'Success',
                    'message' => 'Dirección cambiada exitosamente',
                    'data' => $this->direccion_nueva
                ));
            }
        }
    }

    private function obtener_cantidad_productos($cart) {
        if(!empty($cart)) {
            $cantidad_productos = 0;
            foreach ($cart as $producto) {
                $cantidad_productos += $producto['cantidad'];
            }
            return $cantidad_productos;
        }
    }
}
