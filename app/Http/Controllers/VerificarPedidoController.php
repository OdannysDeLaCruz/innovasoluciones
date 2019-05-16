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
        if (count($cart) == 0) {
            session()->flash('response', true);
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

        // Verifico si hay algun código usado ya
        if(session('codigos_usados') > 1 ) {
            session()->flash('Errors', 'No puede usar mas de un código de descuento');
            return redirect()->route('verificar');
        }

        // Verifico si existe en la tabla
        $existe = App\Promocion::where('promo_nombre', $codigo_usuario)->get();

        // Si no existe en la base de datos, crear mensaje de error, Código inválido
        if ($existe->isEmpty()) {
            session()->flash('Errors', 'Código inválido');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Si existe, verificar si el codigo no se ha vencido, la fecha actual debe ser menor a la fecha final del codigo de descuento
        $fecha_limite_codigo = $existe[0]->promo_final;

        date_default_timezone_set('America/Bogota');
        $fecha_actual = date('Y-m-d H:i:s');

        if($fecha_actual > $fecha_limite_codigo) {
            // Codigo vencído
            session()->flash('Errors', 'Este código ha expirado, intente con otro');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Si esta vigente, verifico numero de canjeos en otros pedidos
        $canjeos_permitidos = $existe[0]->promo_numero_canjeo;
        $canjeos_usados = App\Pedido::where('promocion_id', $existe[0]->id)->get()->count('codigo_descuento');

        if ($canjeos_usados >= $canjeos_permitidos) {
            // Numero de canjeos excedido
            session()->flash('Errors', 'Este código ya no esta disponible');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Si se puede canjear, verificar el monto minimo del carrito para ser usado
        $promo_minimo_pedido = floatval($existe[0]->promo_minimo_pedido); // formtato - 1000.0

        // Obtengo el total del pedido guardado en la variable de session total_del_pedido
        $total_del_pedido = session('total_del_pedido'); // formtato - 1000.0

        if ($total_del_pedido < $promo_minimo_pedido) {
            // Total del pedido menor al minimo requerido del código
            session()->flash('Errors', 'Se requiere un mínimo de $' . number_format($promo_minimo_pedido, 0, '', '.') . ' para utilizar este código');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }
        
        // Si todo esta bien, hacer el descuento al total del pedido

        // Guardo el id del codigo usado para insertarlo luego en la tabla del pedido
        session()->put('promocion_id', $existe[0]->id);
        $promo_tipo  = $existe[0]->promo_tipo;
        $promo_costo = $existe[0]->promo_costo;


        $this->hacer_descuento($total_del_pedido, $promo_tipo, $promo_costo);

        session()->put('codigos_usados', $codigo_usuario);
        //guardo la notificacion del descuento a true
        session()->put('descuento_realizado', true);

        return redirect()->route('verificar')->with('noticia_descuento', 'Ha recibido un descuento de $' . number_format(session('descuento_peso'), 0, ',', '.'));
    }

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
