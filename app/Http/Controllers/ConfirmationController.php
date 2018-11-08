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
    public function confirmation(/*Request $request*/) {
    	// Prueba de que se esta ejecutando este controlador
    	$fp = fopen('pruebas.txt', "a");
		if($fp) {
			fwrite($fp, 'Se esta usuando este controlador');
			fclose($fp);
		}

    	// Configurar zona horaria
    	date_default_timezone_set('America/Bogota');

		// Obtener datos de payu

		// $sign = $request['sign'];
  //   	$merchant_id = $request['merchant_id'];
  //   	$reference_pol = $request['reference_pol'];

    	// $firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";

		// $state_pol            = $request['state_pol'];
		// $response_message_pol = $request['response_message_pol'];
		// $response_code_pol    = $request['response_code_pol'];

		// $id_user   = Auth::user()->id;
		// $comprador = Auth::user()->nombre . " " . Auth::user()->apellido;
		// $ref_venta = $request['reference_sale'];
		// $direccion_envio = $request['shipping_address'];

		// $payment_method_id = $request['payment_method_id'];
		// switch ($payment_method_id) {
		// 	case 2: $medio_pago = 'CREDIT_CARD'; break;
		// 	case 4: $medio_pago = '	PSE'; break;
		// 	case 5: $medio_pago = 'ACH'; break;
		// 	case 6: $medio_pago = 'DEBIT_CARD'; break;
		// 	case 7: $medio_pago = 'CASH'; break;
		// 	case 8: $medio_pago = 'REFERENCED'; break;
		// 	case 10: $medio_pago = 'BANK_REFERENCED'; break;
		// 	case 14: $medio_pago = 'SPEI'; break;
		// }

		// $payment_method_name = $request['payment_method_name'];
		// $date = $request['date'];



		// $state_pol            = $_POST['state_pol'];
		// $response_message_pol = $_POST['response_message_pol'];
		// $response_code_pol    = $_POST['response_code_pol'];

		// $id_user   = Auth::user()->id;
		// $comprador = Auth::user()->nombre . " " . Auth::user()->apellido;
		// $ref_venta = $_POST['reference_sale'];
		// $direccion_envio = $_POST['shipping_address'];

		// $payment_method_id = $_POST['payment_method_id'];
		// switch ($payment_method_id) {
		// 	case 2:$medio_pago = 'CREDIT_CARD'; break;
		// 	case 4: $medio_pago = '	PSE'; break;
		// 	case 5: $medio_pago = 'ACH'; break;
		// 	case 6: $medio_pago = 'DEBIT_CARD'; break;
		// 	case 7: $medio_pago = 'CASH'; break;
		// 	case 8: $medio_pago = 'REFERENCED'; break;
		// 	case 10: $medio_pago = 'BANK_REFERENCED'; break;
		// 	case 14: $medio_pago = 'SPEI'; break;
		// }
		// $payment_method_name = $_POST['payment_method_name'];
		// $date = $_POST['date'];

  //   	if($state_pol == 4 && $response_message_pol == 'APPROVED' && $response_code_pol == 1) {
  //   		try {
		// 		App\Pedido::create([ 
		// 		    'id_user'         => $id_user,
		// 	        'comprador'       => $comprador,
		// 	        'ref_venta'       => 'prueba',
		// 	        'direccion_envio' => 'prueba',
		// 	        'modo_pago'       => 'prueba',
		// 	        'codigo_descuento'=> 'prueba',
		// 	        'modo_envio'      => 'prueba',
		// 	        'estado_pedido'   => 'prueba',
		// 	        'fecha_pedido'    => $date,
		// 	    ]);

		// 		// Si se ha creado el pedido correctamente, enviar un correo de confirmacion al usuario
		// 	    $fp = fopen('pruebas.txt', "a");
		// 		if($fp) {
		// 			fwrite($fp, 'Pedido creado');
		// 			fclose($fp);
		// 		}
		// 	}
		// 	catch (Exception $e) {
		// 		// Si hay algun error al intentar crear el pedido, enviar un correo a soporte tecnico de Innova.
		// 		$msm $e->getMessage();
		// 		$fp = fopen('pruebas.txt', "a");
		// 		if($fp) {
		// 			fwrite($fp, 'Error al intentar crear pedido : ' . $msm);
		// 			fclose($fp);
		// 		}
		// 	}
  //   	}
  //       else {
  //       	$fp = fopen('pruebas.txt', "a");
		// 	if($fp) {
		// 		fwrite($fp, 'No se ha podido crear el pedido, estado de pedido rechazado');
		// 		fclose($fp);
		// 	}
		// }
    }
}
