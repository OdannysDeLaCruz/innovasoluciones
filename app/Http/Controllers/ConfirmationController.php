<?php

namespace App\Http\Controllers;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConfirmationController extends Controller
{
	
    private $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";
	
    public function response(Request $request) {

		$file = fopen("data.txt", "a");
		fwrite($file, "# Response\n");
		fwrite($file, "#-------------------------------------------------------\n");
		foreach($_GET as $id => $responseValue){
		  fwrite($file, $id . " => " . $responseValue . "\n");
		}
		fclose($file);
	

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
    	// \Log::debug('Datos desde payu');
    	// Configuracion de zona horaria
		// date_default_timezone_set('America/Bogota');

    	// $sign = $request['sign'];
    	// $merchant_id = $request['merchant_id'];
    	// $reference_sale = $request['reference_sale'];
    	// $reference_pol = $request['reference_pol'];

    	// $firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";

    	// $nickname_buyer = $request['nickname_buyer'];
    	// $shipping_city = $request['shipping_city'];
    	// $payment_method_name = $request['payment_method_name'];

    	/*$reference_sale = $request['reference_sale'];
    	$reference_pol = $request['reference_pol'];
    	$transaction_id = $request['transaction_id'];
    	$state_pol = $request['state_pol'];*/

    	// $reference_sale = $_Request['reference_sale'];
    	// $reference_pol  = $_Request['reference_pol'];
    	// $transaction_id = $_Request['transaction_id'];
    	// $state_pol      = $_Request['state_pol'];
    	

    		// App\Pedido::create([ 
		    //     'id_user' => Auth::user()->id,
	     //        'comprador' => $nickname_buyer,
	     //        'ref_venta' => $reference_sale,
	     //        'direccion_envio' => $shipping_city,
	     //        'modo_pago' => $payment_method_name,
	     //        'codigo_descuento' => session('codigos_usados'),
	     //        'modo_envio' => session('entrega_pedido'),
	     //        'estado_pedido' => $state_pol,
	     //        'fecha_pedido' => date('Y-n-j H:i:s')
	    	// ]);

  //   	$file = fopen("data.txt", "a");
		// fwrite($file, "# Confirmation\n");
		// fwrite($file, "#-------------------------------------------------------\n");
		// foreach($_POST as $id => $responseValue){
		//   fwrite($file, $id . " => " . $responseValue . "\n");
		// }
		// fclose($file); 

    // 	if($state_pol == 4) {
	   //  	App\Producto::create([
	   //          'id_categoria' => 1,
	   //          'descripcion' => 'PRUEBA',
	   //          'tags' => 'PRUEBA, PRUEBA',
	   //          'referencia' => 'PRUEBA',
	   //          'imagen' => 'PRUEBA',
	   //       	'precio' => 0,
	   //          'descuento' => 0,
	   //          'tallas' => 'PRUEBA',
	   //          'colores' => 'PRUEBA',
	   //          'tiempo_entrega' => 'PRUEBA',
				// 'imagenDescripcion' => 'PRUEBA',
				// 'cant_disponible' => 0,
	   //          'fecha_creado' => 'PRUEBA'
	   //  	]);
    // 	}


  //   	$mensajeLog = print_r($_POST,true) . "\r\n";
		// if(strlen($mensajeLog)>0){
		// 	$filename = "pruebas.txt";
		// 	$fp = fopen($filename, "a");
		// 	if($fp) {
		// 		fwrite($fp, $mensajeLog, strlen($mensajeLog));
		// 	fclose($fp);

		// 	}
		// }


    	$response_message_pol = $request['response_message_pol'];

		if($response_message_pol){
			$fp = fopen("pruebas.txt", "a");
			if($fp) {
				fwrite($fp, $response_message_pol, strlen($response_message_pol));
			fclose($fp);

			}
		}

    }
}
