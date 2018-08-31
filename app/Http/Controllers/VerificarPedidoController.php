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
    // - VERIFICAR COBRO DE ENVIO
    // - COBRAR IVA DEL PEDIDO
    
    public function verificar() {
        $cart = session('cart');
        if (count($cart) == 0) {
            //Si no hay productos, se redirige a cart con la variable responses en true
            session()->flash('response', true);
            return redirect()->route('showCart');
        }
        // Hago descuento por el codigo ingresado por usuario, este codigo ya ha sido verificado por la funcion verificarCodigo
        $total_del_pedido = session('total_del_pedido');
        $descuento_peso   = session('descuento_peso') ? session('descuento_peso') : 0;
        $total_con_descuento = $total_del_pedido - $descuento_peso;

        // Cobro el iva
        $iva = $total_con_descuento * 0.19; 
        $total_pagar = number_format($total_con_descuento + $iva);

        return view('verificacion', 
            compact(
                'cart',
                'total_del_pedido',
                'total_pagar'
            )
        );
    }

    // - VERIFICAR CODIGO DE DESCUENTO
    public function verificarCodigo(Request $request) {
        // Creo una variable para guardar el código usado, esto se hace para evitar que se vuelva a usar el mismo codigo dos veces y para llevar un conteo de cuantos codigos se han usado ya que solo se permite uno solo

        $codigo_usuario = $request->input('codigo_descuento');
        // Verifico si hay algun código usado ya
        if(session('codigos_usados') > 1 ) {
            session()->flash('Errors', 'No puede usar mas de un código de descuento');
            return redirect()->route('verificar');
        }
        
        // Verifico si existe en la tabla
        $existe = App\CodDescuento::where('codigo_descuento', $codigo_usuario)->get();
        if ($existe->isEmpty()) {
            // Si el codigo no existe en la base de datos, creo el mensaje de error, Código inválido
            session()->flash('Errors', 'Código inválido');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }
        // Si existe, verificar si el codigo no ha vencido, la fecha actual debe ser menor a la fecha final del codigo de descuento
        $fecha_final_codigo = $existe[0]->fecha_final;

        date_default_timezone_set('America/Bogota');
        $fecha_actual = date('Y-m-d H:i:s');

        if($fecha_actual > $fecha_final_codigo) {
            // Codigo vencído
            session()->flash('Errors', 'Este código ha expirado, intente con otro');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Si esta vigente, verifico numero de canjeos en otros pedidos
        $canjeos = $existe[0]->numero_canjeo;
        $num_codigo_usados = App\Pedido::where('codigo_descuento', $codigo_usuario)->get()->count('codigo_descuento');

        if ($num_codigo_usados >= $canjeos) {
            // Numero de canjeos excedido
            session()->flash('Errors', 'Este código ya no esta disponible');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }

        // Si se puede canjear, verificar el costo minimo para este codigo, en comparación al carrito en la variable de session
        $minimo_carrito = $existe[0]->minimo_carrito;
        // Obtenemo el total del pedido guardado en la variable de session total_del_pedido
        $total_del_pedido = session('total_del_pedido');
      
        if ($total_del_pedido < $minimo_carrito) {
            // Total del pedido menor al minimo requerido del código
            session()->flash('Errors', 'Se requiere un mínimo de $' . number_format($minimo_carrito, 2) . ' para utilizar este código');
            return redirect()->route('verificar')->with('codigo_verificado', $codigo_usuario);
        }
        
        // Si todo esta bien, hacer el descuento al total del pedido
        $descuento = App\CodDescuento::where('codigo_descuento', $codigo_usuario)->value('descuento');
        $descuento_peso = $total_del_pedido * ( $descuento / 100 );
        // Despues de validar todas los posibles filtros, lo guardo y el flujo sigue adelante
        session()->put('codigos_usados', $codigo_usuario);
        // guardo el descuento en una variable de session
        session()->put('descuento_peso', $descuento_peso);
        //guardo la notificacion del descuento a true
        session()->put('notificacion_codigo', true);

        

        return redirect()->route('verificar')->with('noticia_descuento', 'Ha recibido un descuento de $' . number_format($descuento_peso, 2));
    }

    // /*
    // * VERIFICAR COSTO DE ENVÍO
    // * Existen dos formas de entregar el pedido al cliente.
    // * 1 - Envío a su domicilio (Se cobra el valor del envío).
    // * 2 - Recogerlo en la tienda fisica del vendedor.
    // */

    // public function verificarEnvio(request $request) {
    //     $tipo_envio = $request->input('tipo_envio');

    //     // Verifico que tipo de envío se escogio.
    //     // Si $tipo_envio = 1, cobrar el costo de envio en caso de tener, verificar si es envio gratis.
    //     // Si $tipo_envio = 2, recoger en tienda, no cobrar envío.

    //     // dd($tipo_envio);

    //     return redirect()->route('payment');
    // }
}
