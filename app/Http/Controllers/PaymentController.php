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
	public function __construct() {
		$this->middleware('auth');
		$cart = session('cart');
		if (count($cart) == 0) {
			return redirect()->route('showCart');
		}
	}

	public function modoEnvio($request) {
		// Verifico que tipo de entrega se escogio.
		$envio_id = intval($request->input('tipo_entrega'));
		session()->put('tipo_envio', $envio_id);
	}

	public function calcularTotal() {
		$cart = session('cart');		
		$total_del_pedido = session('total_del_pedido');
		$descuento_peso   = session('descuento_peso');
		$total_pagar      = session('total_pagar');
		return $total_pagar;
	}
   
	public function payment(Request $request) {
		// Obtener total a pagar
		$total_pagar = $this->calcularTotal();
		
		// Obtener metodo de entrega del pedido
		$this->modoEnvio($request);

		// Guardar referencia del pedido en una variable de sesion
		$pedido_ref_venta = 'RV' . time() . mt_rand(1111, 9999); // RV = Referencia de Venta
		session()->put('pedido_ref_venta', $pedido_ref_venta);

		// Configurar los datos para la pasarela de Payu
		$dataPayu['merchantId'] = '508029';
		$dataPayu['accountId'] = '512321';
		$dataPayu['extra2'] = 0; // id del pedido para actualizarlo luego
		$dataPayu['description'] = "Compra desde tienda online Innova Soluciones";
		$dataPayu['referenceCode'] = $pedido_ref_venta;
		$dataPayu['amount'] = $total_pagar;
		$dataPayu['tax'] = 0;
		$dataPayu['taxReturnBase'] = 0;
		$dataPayu['currency'] = 'COP';
		
		$apiKey = '4Vj8eK4rloUd272L48hsrarnUA';
		$firma = $apiKey.'~'.$dataPayu['merchantId'].'~'.$dataPayu['referenceCode'].'~'.$dataPayu['amount'].'~'.$dataPayu['currency'];
		
		$dataPayu['signature'] = md5($firma);
		$dataPayu['test'] = 1;

		$dataPayu['buyerFullName'] = Auth::user()->usuario_nombre . ' ' . Auth::user()->usuario_apellido;
		$dataPayu['buyerEmail']    = Auth::user()->email;
		$dataPayu['telephone']     = Auth::user()->usuario_telefono;

		// $dataPayu['shippingAddress'] = Auth::user()->direccion . ' - ' . Auth::user()->barrio;
		// $dataPayu['shippingCity'] = Auth::user()->ciudad;
		// $dataPayu['shippingCountry'] = 'CO';

		$dataPayu['responseUrl'] = "https://innovainc.co/response";
		// $dataPayu['responseUrl'] = "www.innovasoluciones.com/response";
		$dataPayu['confirmationUrl'] = "https://innovainc.co/confirmation";
		// $dataPayu['confirmationUrl'] = "www.innovasoluciones.com/confirmation";

		$cart = session('cart');

		if (empty($cart)) {
            session()->flash('vacio', true);
            return redirect()->route('showCart');
        }
        $cantidad_productos = 0;
        foreach ($cart as $producto) {
            $cantidad_productos += $producto['cantidad'];
        }

        $total_del_pedido = session('total_del_pedido');
        $descuento_peso   = session('descuento_peso') ? session('descuento_peso') : 0;

        $total_pagar = $total_del_pedido - $descuento_peso;
        session()->put('total_pagar', $total_pagar);
        $total_pagar = session('total_pagar');
        
		return view('payment', 
			compact(
				'total_del_pedido',
				'cantidad_productos',
				'descuento_peso',
				'total_pagar',
				'dataPayu'
			)
		);
	}
}
