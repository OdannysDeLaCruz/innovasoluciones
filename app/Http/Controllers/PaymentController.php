<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
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

    public function costoEnvio($request) {

        // Verifico que tipo de envío se escogio.
        // Si $tipo_envio = 1, cobrar el costo de envio en caso de tener, verificar si es envio gratis.
        // Si $tipo_envio = 2, recoger en tienda, no cobrar envío.
        $tipo_envio = $request->input('tipo_envio');

        if ($tipo_envio == '1') {
            // Obtengo el costo de envio del producto pedido almacenado en la variable de session
            
            $cart = session('cart');
            foreach ($cart as $producto) {
                $id = $producto['id'];
                $descripcion = $producto['descripcion'];
            }
            $producto = App\Producto::where('id', $id)->where('descripcion', $descripcion)->get();

            // Por cuestiones de desarrollo, enviere un costo ficticio, para hacerlo mas real, jugare entre envio gratis y 10000

            $envio_ficticios = ['gratis', 10000];
            $costo_envio = $envio_ficticios[rand(0,1)];
            // $costo_envio = 10000;

        }
        else {
            // Si es 2, no cobrar envio
            $costo_envio = 0;
        }

        // Verifico el cobro del envío
        
        if ($costo_envio == 'gratis') {
            return $envio = 0;
        }
        else {
            return $envio = $costo_envio;
        }

    }
    public function calcularTotal($request) {
        $cart = session('cart');
        if (count($cart) == 0) {
            //Si no hay productos, se redirige a cart con la variable responses en true
            session()->flash('response', true);
            return redirect()->route('showCart');
        }
        // Hago descuento por el codigo ingresado por usuario, este codigo ya ha sido verificado por la funcion verificarCodigo
        $total_del_pedido = session('total_del_pedido');
        $descuento_peso   = session('descuento_peso') != "" ? session('descuento_peso') : 0;
        $total_con_descuento = $total_del_pedido - $descuento_peso;
        
        // Cobro el iva
        $iva = $total_con_descuento * 0.19; 
        $total_pagar = number_format($total_con_descuento + $iva);

        return $total_pagar;
    }
    
    public function payment(Request $request) {
        
        // Obtener los datos finales del pedido

        $total_pedido = $this->calcularTotal($request);
        $costo_envio = $this->costoEnvio($request);
        $total_pagar = $total_pedido + $costo_envio;

        // Configurar los datos para la pasarela de Payu

        $dataPayu['merchantId'] = '508029';
        $dataPayu['accountId'] = '512321';
        $dataPayu['description'] = "Test PAYU";
        $dataPayu['referenceCode'] = 'INNOVA' . time();
        $dataPayu['amount'] = $total_pagar;
        $dataPayu['tax'] = 0;
        $dataPayu['taxReturnBase'] = 0;
        $dataPayu['currency'] = 'COP';
        
        $apiKey = '4Vj8eK4rloUd272L48hsrarnUA';
        $firma = $apiKey.'~'.$dataPayu['merchantId'].'~'.$dataPayu['referenceCode'].'~'.$dataPayu['amount'].'~'.$dataPayu['currency'];
        
        $dataPayu['signature'] = md5($firma);
        $dataPayu['test'] = 1;
        $dataPayu['buyerEmail'] = 'test@test.com';
        $dataPayu['responseUrl'] = "http://www.innovasoluciones.com/response";
        $dataPayu['confirmationUrl'] = "http://www.innovasoluciones.com/confirmation";

        return view('payment', 
            compact(
                'total_pedido', 
                'costo_envio', 
                'total_pagar',
                'dataPayu'
            )
        );
    }
}
