<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConfirmationController extends Controller
{

	// PASOS A DESARROLLAR
	// Almacenar la api key de seguridad de payu, obtener de plataforma payu una vez registrados.
    private $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";

	// Recepcion y verificacion de los datos de funcion response
  	// public function response(Request $request) {

  //   	// Numero de identificación del comercio en el sistema de payu
		// $merchant_id   = $request['merchantId'];
		// // Referencia de venta o pedido que se envia al sistema
		// $referenceCode = $request['referenceCode'];
		// // Es el monto total de la transacción. Puede contener dos dígitos decimales. Ej. 10000.00 ó 10000
		// $TX_VALUE      = $request['TX_VALUE'];
		// $New_value     = number_format($TX_VALUE, 1, '.', '');
		// // La moneda respectiva en la que se realiza el pago
		// $currency      = $request['currency'];
		// // Indica el estado de la transacción en el sistema
		// $transactionState = $request['transactionState'];
		// // Firma creada localmente para comparar con la firma que viene del sistema
		// $firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
		// $firmacreada   = md5($firma_cadena);
		// // Es la firma digital creada para cada uno de las transacciones
		// $firma         = $request['signature'];
		// // La referencia o número de la transacción generado en PayU
		// $reference_pol = $request['reference_pol'];
		// // El cus, código único de seguimiento, es la referencia del pago dentro del Banco, aplica solo para pagos con PSE
		// $cus           = $request['cus'];
		// // Es la descripción de la venta
		// $description   = $request['description'];
		// // Campo adicional para enviar información sobre la compra. Ej. Codigo id del pedido a actualizar
		// $extra1        = $request['extra1'];
		// // El nombre del banco, aplica solo para pagos con PSE
		// $pseBank       = $request['pseBank'];
		// // Medio de pago con el cual se hizo el pago por ejemplo VISA
		// $lapPaymentMethod = $request['lapPaymentMethod'];
		// // Tipo de medio de pago con el que se realiza por ejemplo CREDIT_CARD
		// $lapPaymentMethodType = $request['lapPaymentMethodType'];
		// // Identificador de la transacción
		// $transactionId = $request['transactionId'];

		
		// $direccion_envio = Auth::user()->direccion . ' - ' . Auth::user()->barrio;
		// $forma_entrega = session('entrega_pedido');

		// if ($transactionState == 4 ) {
		// 	$estadoTx = "Transacción aprobada";
		// }
		// else if ($transactionState == 6 ) {
		// 	$estadoTx = "Transacción rechazada";
		// }
		// else if ($transactionState == 7 ) {
		// 	$estadoTx = "Transacción pendiente";
		// }
		// else if ($transactionState == 104 ) {
		// 	$estadoTx = "Error";
		// }
		// else {
		// 	$estadoTx = $request['mensaje'];
		// }

  //   	return view('response',
  //   		compact(
  //   			'estadoTx',
  //   			'merchant_id',
  //   			'referenceCode',
  //   			'TX_VALUE',
  //   			'New_value',
  //   			'currency',
  //   			'transactionState',
  //   			'firma_cadena',
  //   			'firmacreada',
  //   			'firma',
  //   			'reference_pol',
  //   			'cus',
  //   			'extra1',
  //   			'pseBank',
  //   			'lapPaymentMethod',
  //   			'lapPaymentMethodType',
  //   			'transactionId', 
  //   			'direccion_envio',
  //   			'forma_entrega'
  //   		)
  //   	);
  //   }

    // Recepcion y verificacion de los datos de funcion confirmation
	// Actualizar la información de la tabla pedidos con los nuevos datos recibidos en confirmation
	// Enviar mensaje de correo electronico al usuario informando de el estado de su pedido
 
    public function confirmation() {
		// Firma digital de la transacción que viene de Payu
		$sign = $_POST['sign']; //e1b0939bbdc99ea84387bee9b90e4f5c

	    $mensajeLog = print_r($_POST,true) . "\r\n";
		$fp = fopen("data.txt", "a");
		fwrite($fp, "Sing: $sign \r\nDatos obtenidos: \r\n $mensajeLog");
		fclose($fp);



    	date_default_timezone_set('America/Bogota');
    	
		// Obtener datos de payu

    	// Es el número identificador del comercio en el sistema de PayU
		$merchant_id = $_POST['merchant_id'];

		// 4 = aprovada, 6 = declinada, 5 = expirada
		$state_pol = $_POST['state_pol'];

		/* ENTITY_DECLINED  APPROVED, PAYMENT_NETWORK_REJECTED, INVALID_CARD, INSUFFICIENT_FUNDS, CONTACT_THE_ENTITY, EXPIRED_CARD, RESTRICTED_CARD, INVALID_EXPIRATION_DATE_OR_SECURITY_CODE, INVALID_TRANSACTION, EXCEEDED_AMOUNT, ABANDONED_TRANSACTION, PAYMENT_NETWORK_NO_CONNECTION, NOT_ACCEPTED_TRANSACTION, ERROR, EXPIRED_TRANSACTION */
		$response_message_pol = $_POST['response_message_pol'];

		// El código de respuesta de PayU, Alfa numerico.
		$response_code_pol = $_POST['response_code_pol'];

		// Fecha de tansaccion de la compra, diferente a fecha_creado de realizado el pedido
		$transaction_date = $_POST['transaction_date'];

		$value = $_POST['value']; // 1000.00 , 1000
		$new_value = number_format($value, 1, '.', ''); // 1000.0

		// Puedo utilizar cualquiera de los dos para identificar el medio de pago
		// El tipo de medio de pago utilizado para el pago, Numérico.
		$payment_method_type = $_POST['payment_method_type'];
		// Identificador del medio de pago.
		$payment_method_id = $_POST['payment_method_id'];

		// 2  |  CREDIT_CARD	  |   Tarjetas de Crédito
		// 4  |  PSE 			  |   Transferencias bancarias PSE
		// 5  |  ACH			  |   Débitos ACH
		// 6  |  DEBIT_CARD		  |   Tarjetas débito
		// 7  |  CASH			  |   Pago en efectivo
		// 8  |  REFERENCED		  |   Pago referenciado
		// 10 |  BANK_REFERENCED  |   Pago en bancos
		// 14 |  SPEI			  |   Transferencias bancarias SPEI

		switch ($payment_method_id) {
			case 2:  $medio_pago = 'CREDIT_CARD'; break;
			case 4:  $medio_pago = 'PSE'; break;
			case 5:  $medio_pago = 'ACH'; break;
			case 6:  $medio_pago = 'DEBIT_CARD'; break;
			case 7:  $medio_pago = 'CASH'; break;
			case 8:  $medio_pago = 'REFERENCED'; break;
			case 10: $medio_pago = 'BANK_REFERENCED'; break;
			case 14: $medio_pago = 'SPEI'; break;
		}

		// id de la transacción hecha en payu
		$transaction_id = $_POST['transaction_id']; //f5e668f1-7ecc-4b83-a4d1-0aaa68260862

		$payment_method_name = $_POST['payment_method_name']; //VISA

		$currency = $_POST['currency']; //USD, COP

		// Número de cuotas en las cuales se difirió el pago con tarjeta crédito.
		$installments_number = $_POST['installments_number']; //1

		// Id del pedido a actualizar
		$pedido_id = $_POST['extra2']; // 10

		// Dirección ip desde donde se realizó la transacción.
		$ip = $_POST['ip']; //190.242.116.98

		// Referencia del pedido en payu
		$reference_pol = $_POST['reference_pol']; //7069375

		// Es la referencia de la venta o pedido. Deber ser único por cada transacción que se envía al sistema.
		// Esta es la que se envió a payu desde el formulario en el input referenceCode
		$reference_sale = $_POST['reference_sale']; //2015-05-27 13:04:37

		// Para pagos con pse
		$pse_cus        = $_POST['cus'];
		$pse_bank       = $_POST['pse_bank'];
		$pse_reference1 = $_POST['pse_reference1'];
		$pse_reference2 = $_POST['pse_reference2'];
		$pse_reference3 = $_POST['pse_reference3'];


		// VERIFICAR LA FIRMA QUE VIENE DE PAYU

    	// Esquema de la firma : "ApiKey~merchant_id~reference_sale~new_value~currency~state_pol"
    	$firma_cadena  = md5("$this->ApiKey~$merchant_id~$reference_sale~$new_value~$currency~$state_pol");

    	$fp = fopen("data.txt", "a");
		fwrite($fp, "Sing: \r\n $sign \r\n Firma generada: \r\n: $firma_cadena");
		if ($sign === $firma_cadena) {
			fwrite($fp, "\r\n Las firmas son iguales");
		}else {
			fwrite($fp, "\r\n Las firmas NO son iguales");			
		}
		fclose($fp);

    	$pedido_id = (int)$pedido_id;
        $pedido    = App\Pedido::find($pedido_id);
        $pedido->pedido_ref_venta = $reference_sale;
	    $transaccion_id = $pedido->transaccion_id;
        $pedido->save();

    	if ($sign === $firma_cadena) {
	        
    		// Verificar el estado de la transacción
	  		if ($state_pol == 4 && $response_message_pol === 'APPROVED' && $response_code_pol == 1) {  
	  			$descripcion_transaccion = 'Transacción aprobada';
			}
			if ($state_pol == 6) {
				if ($response_code_pol == 4) {
					if ($response_message_pol === 'PAYMENT_NETWORK_REJECTED') {
						$descripcion_transaccion = 'Transacción rechazada por entidad financiera';
					}
				}
				if ($response_code_pol == 5) {
					if ($response_message_pol === 'ENTITY_DECLINED') {
						$descripcion_transaccion = 'Transacción rechazada por el banco';
					}
				}
				if ($response_code_pol == 6) {
					if ($response_message_pol === 'INSUFFICIENT_FUNDS') {
						$descripcion_transaccion = 'Fondos insuficientes';
					}
				}
				if ($response_code_pol == 7) {
					if ($response_message_pol === 'INVALID_CARD') {
						$descripcion_transaccion = 'Tarjeta inválida';
					}
				}
				if ($response_code_pol == 8) {
					if ($response_message_pol === 'CONTACT_THE_ENTITY') {
						$descripcion_transaccion = 'Contactar entidad financiera';						
					}
					if (
						$response_message_pol === 'BANK_ACCOUNT_ACTIVATION_ERROR' && 
						$response_message_pol === 'BANK_ACCOUNT_NOT_AUTHORIZED_FOR_AUTOMATIC_DEBIT' && 
						$response_message_pol === 'INVALID_AGENCY_BANK_ACCOUNT' && 
						$response_message_pol === 'INVALID_BANK_ACCOUNT' &&
						$response_message_pol === 'INVALID_BANK'
					) {
						$descripcion_transaccion = 'Débito automático no permitido';
					}
				}
				if ($response_code_pol == 9) {
					if ($response_message_pol === 'EXPIRED_CARD') {
						$descripcion_transaccion = 'Tarjeta vencida';	
					}
				}
				if ($response_code_pol == 10) {
					if ($response_message_pol === 'RESTRICTED_CARD') {
						$descripcion_transaccion = 'Tarjeta restringida';	
					}
				}
				if ($response_code_pol == 12) {
					if ($response_message_pol === 'INVALID_EXPIRATION_DATE_OR_SECURITY_CODE') {
						$descripcion_transaccion = 'Fecha de expiración o código de seguridadinválidos';	
					}
				}
				if ($response_code_pol == 13) {
					if ($response_message_pol === 'REPEAT_TRANSACTION') {
						$descripcion_transaccion = 'Reintentar pago';	
					}
				}
				if ($response_code_pol == 14) {
					if ($response_message_pol === 'INVALID_TRANSACTION') {
						$descripcion_transaccion = 'Transacción inválida';	
					}
				}
				if ($response_code_pol == 17) {
					if ($response_message_pol === 'EXCEEDED_AMOUNT') {
						$descripcion_transaccion = 'El valor excede el máximo permitido por la entidad';	
					}
				}
				if ($response_code_pol == 19) {
					if ($response_message_pol === 'ABANDONED_TRANSACTION') {
						$descripcion_transaccion = 'Transacción abandonada por el pagador';	
					}
				}
				if ($response_code_pol == 22) {
					if ($response_message_pol === 'CREDIT_CARD_NOT_AUTHORIZED_FOR_INTERNET_TRANSACTIONS') {
						$descripcion_transaccion = 'Tarjeta no autorizada para comprar por internet';	
					}
				}
				if ($response_code_pol == 23) {
					if ($response_message_pol === 'ANTIFRAUD_REJECTED') {
						$descripcion_transaccion = 'Transacción rechazada por sospecha de fraude';	
					}
				}
				if ($response_code_pol == 9995) {
					if ($response_message_pol === 'DIGITAL_CERTIFICATE_NOT_FOUND') {
						$descripcion_transaccion = 'Certificado digital no encotnrado';	
					}
				}
				if ($response_code_pol == 9996) {
					if ($response_message_pol === 'BANK_UNREACHABLE') {
						$descripcion_transaccion = 'Error tratando de cominicarse con el banco';	
					}
					if ($response_message_pol === 'PAYMENT_NETWORK_NO_CONNECTION') {
						$descripcion_transaccion = 'No fue posible establecer comunicación con la entidad financiera';	
					}
					if ($response_message_pol === 'PAYMENT_NETWORK_NO_RESPONSE') {
						$descripcion_transaccion = 'No se recibió respuesta de la entidad financiera';	
					}
				}
				if ($response_code_pol == 9997) {
					if ($response_message_pol === 'ENTITY_MESSAGING_ERROR') {
						$descripcion_transaccion = 'Error comunicándose con la entidad financiera';	
					}
				}
				if ($response_code_pol == 9998) {
					if ($response_message_pol === 'NOT_ACCEPTED_TRANSACTION') {
						$descripcion_transaccion = 'Transacción no permitida';	
					}
				}
				if ($response_code_pol == 9999) {
					if (
						$response_message_pol === 'INTERNAL_PAYMENT_PROVIDER_ERROR' &&
						$response_message_pol === 'INACTIVE_PAYMENT_PROVIDER' &&
						$response_message_pol === 'ERROR' &&
						$response_message_pol === 'ERROR_CONVERTING_TRANSACTION_AMOUNTS' &&
						$response_message_pol === 'BANK_ACCOUNT_ACTIVATION_ERROR' &&
						$response_message_pol === 'FIX_NOT_REQUIRED' &&
						$response_message_pol === 'AUTOMATICALLY_FIXED_AND_SUCCESS_REVERSAL' &&
						$response_message_pol === 'AUTOMATICALLY_FIXED_AND_UNSUCCESS_REVERSAL' &&
						$response_message_pol === 'AUTOMATIC_FIXED_NOT_SUPPORTED' &&
						$response_message_pol === 'NOT_FIXED_FOR_ERROR_STATE' &&
						$response_message_pol === 'ERROR_FIXING_AND_REVERSING' &&
						$response_message_pol === 'ERROR_FIXING_INCOMPLETE_DATA' &&
						$response_message_pol === 'PAYMENT_NETWORK_BAD_RESPONSE'
					) {
						$descripcion_transaccion = 'Error';
					}
				}
			}
			if ($state_pol == 5 && $response_message_pol === 'EXPIRED_TRANSACTION' && $response_code_pol == 20) {
				$descripcion_transaccion = 'Transacción expirada';
			}

			$transaccion = App\Transaccion::find($transaccion_id);

			$transaccion->estado                = $state_pol;
	        $transaccion->mensaje_respuesta     = $response_message_pol;
	        $transaccion->codigo_respuesta      = $response_code_pol;
	        $transaccion->descripcion_transaccion = $descripcion_transaccion;
	        $transaccion->valor_transaccion     = $value;
	        $transaccion->metodo_pago_tipo      = $payment_method_type;
	        $transaccion->metodo_pago_nombre    = $payment_method_name;
	        $transaccion->metodo_pago_id        = $payment_method_id;
	        $transaccion->id_transaccion        = $transaction_id;
	        $transaccion->referencia_venta_payu = $reference_pol;
	        $transaccion->tipo_moneda_transaccion = $currency;
	        $transaccion->numero_cuotas_pago    = $installments_number;
	        $transaccion->ip_transaccion        = $ip;
	        $transaccion->pse_cus               = $pse_cus ;
	        $transaccion->pse_bank              = $pse_bank;
	        $transaccion->pse_references        = $pse_reference1 . ', ' . $pse_reference2 . ', ' . $pse_reference3;
	        $transaccion->fecha_transaccion     = $transaction_date;
	        $transaccion->fecha_actualizado     = $transaction_date;
	        $transaccion->save();


	        $fp = fopen("data.txt", "a");
			fwrite($fp, "\r\n \r\n Transacción actualizada \r\n: $transaccion_id");
			fclose($fp);
    	}
    }
}