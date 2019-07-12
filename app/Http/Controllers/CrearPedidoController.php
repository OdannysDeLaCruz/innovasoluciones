<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;
use Jenssegers\Agent\Agent;

class CrearPedidoController extends Controller
{
	public function crearPedido(Request $request) {

    	// Verificar si app.js envía una peticion ajax para crear el pedido
		if($request->ajax()) {

			if ($_POST["crear"] == true) {
				date_default_timezone_set('America/Bogota');

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

    			// Crear el pedido
				if($transaccion != "" && count(session('cart')) > 0 ) {
					date_default_timezone_set('America/Bogota');

			        // Obtener direccion por defecto
					$direccion_defecto_usuario = session('direccion_defecto');
			        // Obtener direccion nueva de envio
			        $direccion_nueva_pedido = session('direccion_nueva');

					if($direccion_nueva_pedido == []) {
			            $direccion = $direccion_defecto_usuario;
			        }else {
			            $direccion = $direccion_nueva_pedido;
			        }

					$calle         = $direccion['usuario_calle'];
					$numero_calle  = $direccion['usuario_numero_calle'];
					$barrio        = $direccion['usuario_barrio'];
					$ciudad        = $direccion['usuario_ciudad'];
					$pais          = $direccion['usuario_pais'];
					$codigo_postal = $direccion['usuario_cod_postal'];

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

			        if($pedido != "") {

	    				// Crear detalles del pedido
			        	$pedido_id = $pedido->id; 

	    				$cart = session('cart');
	    				foreach ($cart as $detalle) {

	    					if (array_key_exists('promo_tipo', $detalle)) {
	    						$promo_info = "Tipo de promoción " . $detalle['promo_tipo'] . ", tiene un descuento de " . $detalle['promo_costo'];
	    					}else {
	    						$promo_info = '';
	    					}

				            App\DetallePedido::create([
						        'pedido_id'            => $pedido_id,
						        'detalle_producto_ref' => $detalle['producto_ref'],
						        'detalle_nombre'       => $detalle['nombre'],
						        'detalle_descripcion'  => $detalle['descripcion'],
						        'detalle_imagen'       => $detalle['imagen'],
						        'detalle_precio'       => $detalle['precio'],
						        'detalle_cantidad'     => $detalle['cantidad'],
						        'detalle_promo_info'   => $promo_info,
						        'detalle_precio_final' => $detalle['total'],
						        'detalle_talla'        => $detalle['talla'],
						        'detalle_color'        => $detalle['color']
		    				]);
				        }
				        
	    				// Eliminar todos los datos (variables) de session que esten relacionados con el pedido

	            		$datos_session = ['cart', 'codigos_usados', 'descuento_realizado', 'descuento_peso', 'total_pagar','total_del_pedido','tipo_envio', 'promocion_id', 'direccion_defecto_usuario', 'direccion_nueva_pedido'];
			            foreach ($datos_session as $session) {
			                if (session()->has($session)) {
			                    session()->forget($session);
			                }                
			            }
	    				
			        	// Si se crea el pedido, los detalles y se elimina el carrito, entonces enviar confirmación al usuario

			        	echo json_encode(array(
							'status' => 'Success',
							'pedido_id' => $pedido_id,
							'message' => 'Pedido realizado correctamente'
						));

						// Enviar correo de confirmacion de la compra
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
}
