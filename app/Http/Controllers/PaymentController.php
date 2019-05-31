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
			session()->flash('response', true);
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
		// if (count($cart) == 0) {
		// 	//Si no hay productos, se redirige a cart con la variable responses en true
		// 	session()->flash('response', true);
		// 	return redirect()->route('showCart');
		// }
		// Hago descuento por el codigo ingresado por usuario, este codigo ya ha sido verificado por la funcion verificarCodigo
		
		$total_del_pedido = session('total_del_pedido');
		$descuento_peso   = session('descuento_peso');
		$total_pagar      = session('total_pagar');
		return $total_pagar;
	}
   
	public function payment(Request $request) {
		 // Verificar si existen datos en el carrito, si no, redireccionar a /cart
		// if(session('cart') == '' || session('cart') == null ) {
		// 	return redirect('/cart');
		// }

		// Obtener total a pagar
		$total_pagar = $this->calcularTotal();
		
		// Obtener metodo de entrega del pedido
		$this->modoEnvio($request);

		// Guardar referencia del pedido en una variable de sesion
		$pedido_ref_venta = 'INNOVA' . time();
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
				'total_del_pedido',
				'descuento_peso',
				'total_pagar',
				'dataPayu'
			)
		);
	}
}
