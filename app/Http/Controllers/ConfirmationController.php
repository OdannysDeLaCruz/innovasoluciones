<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ConfirmationController extends Controller
{

	// PASOS A DESARROLLAR
	// Almacenar la api key de seguridad de payu, obtener de plataforma payu una vez registrados.
    private $ApiKey = "4Vj8eK4rloUd272L48hsrarnUA";

	// Recepcion y verificacion de los datos de funcion response
    public function response(Request $request) {

    	// Numero de identificación del comercio en el sistema de payu
		$merchant_id   = $request['merchantId'];
		// Referencia de venta o pedido que se envia al sistema
		$referenceCode = $request['referenceCode'];
		// Es el monto total de la transacción. Puede contener dos dígitos decimales. Ej. 10000.00 ó 10000
		$TX_VALUE      = $request['TX_VALUE'];
		$New_value     = number_format($TX_VALUE, 1, '.', '');
		// La moneda respectiva en la que se realiza el pago
		$currency      = $request['currency'];
		// Indica el estado de la transacción en el sistema
		$transactionState = $request['transactionState'];
		// Firma creada localmente para comparar con la firma que viene del sistema
		$firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
		$firmacreada   = md5($firma_cadena);
		// Es la firma digital creada para cada uno de las transacciones
		$firma         = $request['signature'];
		// La referencia o número de la transacción generado en PayU
		$reference_pol = $request['reference_pol'];
		// El cus, código único de seguimiento, es la referencia del pago dentro del Banco, aplica solo para pagos con PSE
		$cus           = $request['cus'];
		// Es la descripción de la venta
		$description   = $request['description'];
		// Campo adicional para enviar información sobre la compra. Ej. Codigo id del pedido a actualizar
		$extra1        = $request['extra1'];
		// El nombre del banco, aplica solo para pagos con PSE
		$pseBank       = $request['pseBank'];
		// Medio de pago con el cual se hizo el pago por ejemplo VISA
		$lapPaymentMethod = $request['lapPaymentMethod'];
		// Tipo de medio de pago con el que se realiza por ejemplo CREDIT_CARD
		$lapPaymentMethodType = $request['lapPaymentMethodType'];
		// Identificador de la transacción
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

    // Recepcion y verificacion de los datos de funcion confirmation
	// Actualizar la información de la tabla pedidos con los nuevos datos recibidos en confirmation
	// Enviar mensaje de correo electronico al usuario informando de el estado de su pedido
 


    public function confirmation() {
    	date_default_timezone_set('America/Bogota');
    	
		// Obtener datos de payu

		$sign = $_POST['sign'];
  		$merchant_id = $_POST['merchant_id'];
  		$reference_pol = $_POST['reference_pol'];

    	$firma_cadena  = "$this->ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";

		$response_message_pol = $_POST['response_message_pol'];
		$response_code_pol    = $_POST['response_code_pol'];


		$ref_venta      = $_POST['reference_sale'];
		$reference_pole = $_POST['reference_pole'];
		$transaction_id = $_POST['transaction_id'];

		$date = $_POST['date'];

		$state_pol = $_POST['state_pol'];

		$payment_method_id = $_POST['payment_method_id'];
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
		$payment_method_name = $_POST['payment_method_name'];

		$modo_pago = $medio_pago . ' - ' . $payment_method_name;

  		// if($state_pol == 4 && $response_message_pol == 'APPROVED' && $response_code_pol == 1) {}
  		if($state_pol == 4) {
			// Enviar correo de Confirmacion de compra al usuario
		}
		elseif($state_pol == 6) {
			
		}
		else {

		}
    }
}
