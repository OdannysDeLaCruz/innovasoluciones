<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmacionPedidoRealizado;
use Jenssegers\Agent\Agent;

class CrearPedidoPayuController extends Controller
{
	public function index(Request $request) {

    	// Verificar si app.js envía una peticion ajax para crear el pedido
				
		if($request->ajax()) {

			if ($_POST["crear"] == true) {
				date_default_timezone_set('America/Bogota');


				try {
					// Crear una transacción
					$transaccion = App\Transaccion::create([
						'estado'                  => 0,
				        'mensaje_respuesta'       => 'En espera',
				        'codigo_respuesta'        => 'En espera',
				        'descripcion_transaccion' => 'En espera',
				        'valor_transaccion'       => 0,
				        'metodo_pago_tipo'        => 0,
				        'metodo_pago_nombre'      => 'En espera',
				        'metodo_pago_id'          => 0,
				        'id_transaccion'          => 'En espera',
				        'referencia_venta_payu'   => 'En espera',
				        'tipo_moneda_transaccion' => 'En espera',
				        'numero_cuotas_pago'      => 0,
				        'ip_transaccion'          => 'En espera',
				        'pse_cus'                 => 'En espera',
				        'pse_bank'                => 'En espera',
				        'pse_references'          => 'En espera',
					]);

	   				// Si la tranasaccion es exitosa y hay productos en el carrito, crear el pedido
					if($transaccion != "" && count(session('cart')) > 0 ) {
						date_default_timezone_set('America/Bogota');

						$transaccion_id = $transaccion->id;
						$pedido = App\Pedido::create([
					        'user_id'                 => Auth::user()->id,
					        'pedido_ref_venta'        => session('pedido_ref_venta'),
					        'promocion_id'            => session('promocion_id') ? session('promocion_id') : null,
					        'envio_id'                => session('tipo_envio'),
					        'pedido_tipo_dispositivo' => $this->getUserDevice(),
					        'pedido_ip_dispositivo'   => $this->getUserIpAddress(),
					        'transaccion_id'          => $transaccion_id
				        ]);

		     			// verificamos si el pedido se creo correctamente
				        if($pedido != "") {
				        	$pedido_id = $pedido->id;
					        // Recorro el carrito de compra
			  		  		$cart = session('cart');
		  					foreach ($cart as $detalle) {

		  						// Verifico si tiene algún tipo de promocion
			  		  			if (array_key_exists('promo_tipo', $detalle)) {
			  							// $promo_info = "Tipo de promoción " . $detalle['promo_tipo'] . ", tiene un descuento de " . $detalle['promo_costo'];

			  							$promo_tipo = $detalle['promo_tipo'];
			  							$promo_costo = $detalle['promo_costo'];
			  		  			}else {
			  		  				$promo_info = '';
			  		  				$promo_tipo = '';
			  						$promo_costo = '';
			  		  			}

		  						// Crear detalle por cada producto en el carrito
					            App\DetallePedido::create([
							        'pedido_id'            => $pedido_id,
							        'detalle_producto_ref' => $detalle['producto_ref'],
							        'detalle_nombre'       => $detalle['nombre'],
							        'detalle_descripcion'  => $detalle['descripcion'],
							        'detalle_imagen'       => $detalle['imagen'],
							        'detalle_precio'       => $detalle['precio'],
							        'detalle_cantidad'     => $detalle['cantidad'],
							        'detalle_promo_tipo'   => $promo_tipo,
							        'detalle_promo_costo'  => $promo_costo,
							        'detalle_precio_final' => $detalle['total'],
							        'detalle_talla'        => $detalle['talla'],
							        'detalle_color'        => $detalle['color']
								]);
				        	}

					        // Obtener direccion de envio por defecto
					        $user_id = Auth::user()->id;
					        $direccion = App\Direccion::where([ ['user_id', $user_id], ['defecto', 1] ])->get();

							App\DireccionPedido::create([
								'pedido_id' => $pedido_id,
								'nombre_completo' => $direccion[0]->nombre_completo,
								'pais'      => $direccion[0]->pais,
								'estado'    => $direccion[0]->estado,
								'ciudad'    => $direccion[0]->ciudad,
								'direccion' => $direccion[0]->direccion,
								'telenofo'  => $direccion[0]->telefono,
								'codigo_postal' => $direccion[0]->codigo_postal,
							]);

							// Obtener factura y nombre de este pedido
							$factura = $this->generateInvoice($pedido_id);
							$factura_pdf = $factura['pdf'];
							$filename    = $factura['name'];
				        
				 			// Enviar email de confirmacion de creacion del pedido, pero no de pago, la confimacion de pago la realiza el controlador ConfirmacionController
							$this->sendEmailConfirmation(Auth::user()->email, Auth::user()->usuario_nombre . ' ' . Auth::user()->usuario_apellido, $factura_pdf, $filename);

		  					// Eliminar variables de session creadas a lo largo del proceso de compra
							$this->eliminarVariablesSession();	            		
		    				
				        	// Enviar mensaje de creación de pedido y envio de Email de confirmacion
				        	echo json_encode(array(
								'status' => 'Success',
								'pedido_id' => $pedido_id,
								'message' => 'Pedido realizado correctamente'
							));
				    	}
				        else { 
				        	echo json_encode(array(
								'status' => 'Error',
								'id_pedido' => '',
								'message' => 'Error en la creacion del pedido'
							));
				        }
					}
					else {
						// carrito esta vacio
						echo json_encode(array(
							'status' => 'Error',
							'id_pedido' => '',
							'message' => 'No hay productos en el carrito'
						));
					}	
				} 
				catch (Exception $e) {
					echo "Mensaje de error: " . $e->getMessage();
				}
			}
			else {
				echo json_encode(array(
					'status' => 'Error',
					'id_pedido' => '',
					'message' => 'Error al confirmar la creación del pedido'
				));
			}
        }
	}

	// Obtener tipo de dispositivo
	private function getUserDevice() {

		$agent = new Agent();    
        if($agent->isDesktop()){
            // Sistema operativo
            $tipo = 'Escritorio';
            $sistema_operativo = $agent->platform();
            $version_sistema_operativo = $agent->version("$sistema_operativo NT");
            $browser = $agent->browser();

            $dispositivo = $tipo . ' ' . $sistema_operativo . ' ' . (int)$version_sistema_operativo . ', navegador ' . $browser;
        }
        if ( $agent->isMobile() || $agent->isTablet() ) {
            $tipo = 'Movil o tableta';
            if ( $agent->isAndroidOS() || $agent->isiOS() || $agent->isWindowsPhoneOS() || $agent->isWindowsMobileOS() ) {
                $sistema_operativo = $agent->platform();
                $version_sistema_operativo = $agent->version('Android');
                $browser = $agent->browser();

            	$dispositivo = $tipo . ' ' . $sistema_operativo . ' ' . (int)$version_sistema_operativo . ', navegador ' . $browser;
            }
        }

        return $dispositivo;
	}
	// Obtener ip del dispositivo
	private function getUserIpAddress() {

        if (isset($_SERVER["HTTP_CLIENT_IP"])){

            return $_SERVER["HTTP_CLIENT_IP"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){

            return $_SERVER["HTTP_X_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){

            return $_SERVER["HTTP_X_FORWARDED"];

        }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){

            return $_SERVER["HTTP_FORWARDED_FOR"];

        }elseif (isset($_SERVER["HTTP_FORWARDED"])){

            return $_SERVER["HTTP_FORWARDED"];

        }else{

            return $_SERVER["REMOTE_ADDR"];

        }
	} 
	// Eliminar variables de session creadas a lo largo del proceso de compra
	private function eliminarVariablesSession() {
		$sessions = [
			'cart', 
			'codigos_usados', 
			'descuento_realizado', 
			'descuento_peso', 
			'total_pagar',
			'total_del_pedido',
			'tipo_envio', 
			'promocion_id', 
			'direccion_defecto_usuario', 
			'direccion_nueva_pedido'
		];

        foreach ($sessions as $session) {
            if (session()->has($session)) {
                session()->forget($session);
            }                
        }
	}
	// Enviar mensaje de confirmación al usuario
	private function sendEmailConfirmation($email, $user, $factura_pdf, $filename) {
		Mail::to($email, $user)
			->send(new ConfirmacionPedidoRealizado($factura_pdf, $filename));

		// Mail::to($email, $user)
		//     ->queue(new ConfirmacionPedidoRealizado($factura_pdf));
	}

	 /**
     * Generar factura para adjuntar al correo
     * @return $pdf
     */
	private function generateInvoice($id) {

        $user_id = Auth::user()->id;
        $id = $id;
        // Pedido
        $pedido = App\Pedido::select(
        					'pedidos.id as pedidos_id', 
        					'pedidos.pedido_ref_venta as ref_venta',
        					'pedidos.fecha_creado',
        					// Promoción que se le haya aplicado a este pedido
        					'promociones.promo_nombre',
        					'promociones.promo_tipo',
        					'promociones.promo_costo'
        					)
        					->where([
                             	['pedidos.id', '=', $id],
                             	['pedidos.user_id', '=', $user_id]
                            ])
                            ->leftJoin('promociones', 'pedidos.promocion_id', '=', 'promociones.id')
                            ->get();
        // Detalles del pedido
        $detalles = App\Pedido::select('detalle_pedidos.*')
        					->where([
                             	['pedidos.id', '=', $id],
                             	['pedidos.user_id', '=', $user_id]
                            ])
                            ->join('detalle_pedidos', 'detalle_pedidos.pedido_id', '=', 'pedidos.id')
                            ->get();
        // Dirección de envio del pedido
        $direccion = App\DireccionPedido::where('pedido_id', $id)->get();

        $pedido    = $pedido->toArray();
        $detalles  = $detalles->toArray();
        $direccion = $direccion->toArray();

        if($pedido[0]['promo_tipo']) {
 			$costo_promo_pedido =  $pedido[0]['promo_costo'];
 		}

        foreach ($detalles as $detalle) {
        	$importes[] = $detalle['detalle_precio_final'];
        	$subtotal = array_sum($importes);
        }

        if ($pedido[0]['promo_tipo'] == '%') {
			$descuento = $subtotal * $costo_promo_pedido / 100;
			$total = $subtotal - $descuento;
		}elseif ($pedido[0]['promo_tipo'] == '$') {
			$descuento = $costo_promo_pedido;
			$total = $subtotal - $descuento;
		}
		else{
			$total = $subtotal;
		}

        $pdf = \PDF::loadView('users.facturas.detalle', compact('pedido', 'detalles', 'direccion', 'subtotal', 'costo_promo_pedido', 'total'));
        $pdf =  $pdf->download(); 
        $factura = ['pdf' => $pdf, 'name' => 'FACTURA_' . $pedido[0]['ref_venta'] . '.pdf'];
        return $factura;
    }
}
