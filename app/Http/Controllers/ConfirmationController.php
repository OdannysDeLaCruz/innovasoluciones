<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConfirmationController extends Controller
{
	
    private $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
	
    public function response(Request $request) {

		$merchant_id   = $request['merchantId'];
		$referenceCode = $request['referenceCode'];
		$TX_VALUE      = $request['TX_VALUE'];
		$New_value     = number_format($TX_VALUE, 1, '.', '');
		$currency      = $request['currency'];
		$transactionState = $request['transactionState'];
		$firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
		$firmacreada   = md5($firma_cadena);
		$firma         = $request['signature'];
		$reference_pol = $request['reference_pol'];
		$cus           = $request['cus'];
		$extra1        = $request['description'];
		$pseBank       = $request['pseBank'];
		$lapPaymentMethod = $request['lapPaymentMethod'];
		$lapPaymentMethodType = $request['lapPaymentMethodType'];
		$transactionId = $request['transactionId'];

		$direccion_envio = Auth::user()->direccion . ' - ' . Auth::user()->barrio;
		$forma_entrega = session('entrega_pedido');
		
		if ($transactionState == 4 ) {
			$estadoTx = "Transacción aprobada";
		}
		else if ($transactionState == 6 ) {
			$estadoTx = "Transacción rechazada";
		}
		else if ($transactionState == 7 ) {
			$estadoTx = "Transacción pendiente";
		}
		else if ($transactionState == 104 ) {
			$estadoTx = "Error";
		}
		else {
			$estadoTx = $request['mensaje'];
		}

    	return view('response',
    		compact(
    			'estadoTx',
    			'merchant_id',
    			'referenceCode',
    			'TX_VALUE',
    			'New_value',
    			'currency',
    			'transactionState',
    			'firma_cadena',
    			'firmacreada',
    			'firma',
    			'reference_pol',
    			'cus',
    			'extra1',
    			'pseBank',
    			'lapPaymentMethod',
    			'lapPaymentMethodType',
    			'transactionId', 
    			'direccion_envio',
    			'forma_entrega'
    		)
    	);
    }
    public function confirmation(Request $request) {
    	// Configuracion de zona horaria
		date_default_timezone_set('America/Bogota');

    	$sign = $request['sign'];
    	$merchant_id = $request['merchant_id'];
    	$reference_sale = $request['reference_sale'];
    	$reference_pol = $request['reference_pol'];

    	// $firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";

    	$state_pol = $request['state_pol'];
    	$nickname_buyer = $request['nickname_buyer'];
    	$shipping_city = $request['shipping_city'];
    	$payment_method_name = $request['payment_method_name'];

    	if($state_pol == 4) {
    		App\Pedido::create([ 
		        'id_user' => 2,
	            'comprador' => $nickname_buyer,
	            'ref_venta' => $reference_sale,
	            'direccion_envio' => $shipping_city,
	            'modo_pago' => $payment_method_name,
	            'codigo_descuento' => session('codigos_usados'),
	            'modo_envio' => session('entrega_pedido'),
	            'estado_pedido' => $state_pol,
	            'fecha_pedido' => date('Y-n-j H:i:s')
	    	]);
    	}
    }
}
