<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App;

class CrearPedidoController extends Controller
{
	public function crearPedido(Request $request) {

    	// Verificar si app.js envía una peticion ajax para crear el pedido
		if($request->ajax()) {
    		// Crear el pedido
			if ($_POST["crear"] == true) {
				date_default_timezone_set('America/Bogota');

				// Si hay productos en el carrito, crear pedido
				if($cart = session('cart')) {
					$pedido = App\Pedido::create([
				        'user_id'             => Auth::user()->id,
				        'pedido_dir'          => Auth::user()->direccion,
				        'pedido_ref_venta'    => '',
				        'codigo_utilizado_id' => session('codigos_usados') ? session('codigos_usados') : 'No',
				        'envio_id'            => '', //Organizar
				        'metodo_pago_id'      => '', //Organizar
				        'pedido_estado'       => 'en espera',
				        'fecha_creado'        => date('Y-n-j H:i:s')
			        ]);

			        if($pedido !== "") {
			        	$id_pedido = $pedido->id; 

	    				// Crear detalles del pedido
	    				$cart = session('cart');
	    				foreach ($cart as $detalle) {

	    					$precio = $detalle['precio'] * $detalle['cantidad'];
	    					$descuento_peso = $precio * ($detalle['descuento_%'] / 100);
	    					$precio_final = $precio - $descuento_peso;

				            App\DetallePedido::create([
						        'pedido_id'            => $id_pedido,
						        'detalle_descripcion'  => $detalle['descripcion'],
						        'detalle_imagen'       => $detalle['imagen'],
						        'detalle_precio'       => $detalle['precio'],
						        'detalle_cantidad'     => $detalle['cantidad'],
						        'detalle_precio_final' => $precio_final,
						        'detalle_talla'        => $detalle['talla'],
						        'detalle_color'        => $detalle['color']
		    				]);
				        }
				        
	    				// Eliminar carrito de compra

	            		session()->forget('cart');
	    				
			        	// si crea pedido, detalles y elimina carrito enviar confirmación

			        	echo json_encode(array(
							'status' => 'Success',
							'id_pedido' => $id_pedido,
							'message' => 'Será llevado a la plataforma de payu para finalizar la compra'
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
			else {
				echo json_encode(array(
					'status' => 'Error',
					'id_pedido' => '',
					'message' => 'Error al confirmar la creación del pedido'
				));
			}
        }
	}
}
