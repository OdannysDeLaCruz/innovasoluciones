<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\Auth;
class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // Crear variable para almacenar los datos que el usuario dio para el envio.
        if (!session()->has('datos_envio')) {
            session()->put('datos_envio', []);
        }
    }

    /*
    * VERIFICAR COSTO DE ENVÍO
    * Existen dos formas de entregar el pedido al cliente.
    * 1 - Envío a su domicilio (Se cobra el valor del envío).
    * 2 - Recogerlo en la tienda fisica del vendedor.
    */

    public function modoEnvio($request) {

        // Verifico que tipo de entrega se escogio.
        // Si $tipo_envio = 1, envar al domicilio
        // Si $tipo_envio = 2, recoger en tienda
        $tipo_envio = $request->input('tipo_envio');
        session()->put('entrega_pedido', '');

        if ($tipo_envio == '1') {
            // Crear una variable de session para guardar el tipo de entrega del pedido
            $entrega = session('entrega_pedido');
            $entrega = 'Enviar a domicilio';
            session()->put('entrega_pedido', $entrega);
        }
        else {
            $entrega = session('entrega_pedido');
            $entrega = 'Recoger en tienda fisica';
            session()->put('entrega_pedido', $entrega);
        }

    }
    public function calcularTotal() {
        $cart = session('cart');
        if (count($cart) == 0) {
            //Si no hay productos, se redirige a cart con la variable responses en true
            session()->flash('response', true);
            return redirect()->route('showCart');
        }
        // Hago descuento por el codigo ingresado por usuario, este codigo ya ha sido verificado por la funcion verificarCodigo
        $total_del_pedido = session('total_del_pedido');
        $descuento_peso   = session('descuento_peso') != "" ? session('descuento_peso') : 0;
        $total_pagar      = $total_del_pedido - $descuento_peso;
        
        // Retornar total a pagar
        return number_format($total_pagar);
    }
    private function description(){
        $cart = session('cart');
        // foreach ($cart as $dato) {
            
        // }
        // dd($cart);
    }
    
    public function payment(Request $request) {

        // Obtener total a pagar
        $total_pagar = $this->calcularTotal();
        // Obtener metodo de entrega del pedido
        $this->modoEnvio($request);

        // Configurar los datos para la pasarela de Payu
        $dataPayu['merchantId'] = '508029';
        $dataPayu['accountId'] = '512321';
        // $dataPayu['description'] = $this->description();
        $dataPayu['description'] = "Compra desde tienda online Innova Soluciones";
        $dataPayu['referenceCode'] = 'INNOVA' . time();
        $dataPayu['amount'] = $total_pagar;
        $dataPayu['tax'] = 0;
        $dataPayu['taxReturnBase'] = 0;
        $dataPayu['currency'] = 'COP';
        
        $apiKey = '4Vj8eK4rloUd272L48hsrarnUA';
        $firma = $apiKey.'~'.$dataPayu['merchantId'].'~'.$dataPayu['referenceCode'].'~'.$dataPayu['amount'].'~'.$dataPayu['currency'];
        
        $dataPayu['signature'] = md5($firma);
        $dataPayu['test'] = 1;

        $dataPayu['buyerFullName'] = Auth::user()->nombre . Auth::user()->apellido;
        $dataPayu['buyerEmail'] = Auth::user()->email;
        $dataPayu['telephone'] = Auth::user()->telefono;

        $dataPayu['shippingAddress'] = Auth::user()->direccion . ' - ' . Auth::user()->barrio;
        $dataPayu['shippingCity'] = Auth::user()->ciudad;
        $dataPayu['shippingCountry'] = 'CO';

        $dataPayu['responseUrl'] = "http://innovasoluciones.herokuapp.com/response";
        // $dataPayu['responseUrl'] = "www.innovasoluciones.com/response";
        $dataPayu['confirmationUrl'] = "http://innovasoluciones.herokuapp.com/confirmation";
        // $dataPayu['confirmationUrl'] = "www.innovasoluciones.com/confirmation";

        return view('payment', 
            compact(
                'total_pagar',
                'dataPayu'
            )
        );
    }
}
