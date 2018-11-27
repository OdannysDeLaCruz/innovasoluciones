<?php

namespace App\Http\Controllers;

// use App\Traits\TestTrait;
// use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConfirmationController extends Controller
{

    private $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";

    public function response(Request $request) {
		// $file = fopen("data.txt", "a");
		// fwrite($file, "# Response\n");
		// fwrite($file, "#-------------------------------------------------------\n");
		// foreach($_GET as $id => $responseValue){
		//   fwrite($file, $id . " => " . $responseValue . "\n");
		// }
		// fclose($file);

    	// session()->forget('cart');

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
    public function confirmation() {
		// TestTrait::getDatos();
		// Configurar zona horaria
    	date_default_timezone_set('America/Bogota');
    	
    	// Prueba de que se esta ejecutando este controlador
		$fp = fopen("pruebas.txt", "a");
		if($fp) {
			fwrite($fp, "Se esta usuando este controlador" . "\r\n");
			fclose($fp);
		}



		// Obtener datos de payu

		// $sign = $_POST['sign'];
  		// $merchant_id = $_POST['merchant_id'];
  		// $reference_pol = $_POST['reference_pol'];

    	// $firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";

		// $response_message_pol = $_POST['response_message_pol'];
		// $response_code_pol    = $_POST['response_code_pol'];


		// $ref_venta      = $_POST['reference_sale'];
		// $reference_pole = $_POST['reference_pole'];
		// $transaction_id = $_POST['transaction_id'];

		// $direccion_envio = $_POST['shipping_address'];
		// $date = $_POST['date'];

		$id_user   = 1;
		$comprador = "Odannys De La Cruz";
		$state_pol = isset($_POST['state_pol']) ? $_POST['state_pol'] : false;

		
		// $payment_method_id = $_POST['payment_method_id'];
		// switch ($payment_method_id) {
		// 	case 2:  $medio_pago = 'CREDIT_CARD'; break;
		// 	case 4:  $medio_pago = 'PSE'; break;
		// 	case 5:  $medio_pago = 'ACH'; break;
		// 	case 6:  $medio_pago = 'DEBIT_CARD'; break;
		// 	case 7:  $medio_pago = 'CASH'; break;
		// 	case 8:  $medio_pago = 'REFERENCED'; break;
		// 	case 10: $medio_pago = 'BANK_REFERENCED'; break;
		// 	case 14: $medio_pago = 'SPEI'; break;
		// }
		 $medio_pago = 'PRUEBA';
		// $payment_method_name = $_POST['payment_method_name'];

  		// if($state_pol == 4 && $response_message_pol == 'APPROVED' && $response_code_pol == 1) {
  		if($state_pol == 4) {

	  		// Créo el pedido nuevo
	  		DB::table('pedidos')->insert(
				[
			    	'id_user'         => $id_user,
			        'comprador'       => $comprador,
			        'ref_venta'       => 'ref_venta',
			        'direccion_envio' => 'direccion_envio',
			        'modo_pago'       => $medio_pago,
			        'codigo_descuento'=> 'prueba',
			        'modo_envio'      => 'prueba',
			        'estado_pedido'   => 'Ok',
			        'fecha_pedido'    => date()
				]
			);

			// Si se ha creado el pedido correctamente, enviar un correo de confirmacion al usuario
		    $fp = fopen('pruebas.txt', "a");
			fwrite($fp, 'Pedido creado' . "\r\n");
			fclose($fp);
		}
		else {
			$fp = fopen('pruebas.txt', "a");
			fwrite($fp, 'Ha ocurrido un error' . "\r\n");
			fclose($fp);
		}
    }
}
