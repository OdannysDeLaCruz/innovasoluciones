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
				$pedido = App\Pedido::create([
		            'id_user'         => Auth::user()->id,
			        'comprador'       => Auth::user()->nombre . ' ' . Auth::user()->apellido,
			        'ref_venta'       => '',
			        'direccion_envio' => Auth::user()->direccion,
			        'modo_pago'       => '',
			        // codigo_descuento y modo_envio se obtienen de la tabla cart
			        'codigo_descuento'=> session('codigos_usados') ? session('codigos_usados') : 'No',
			        'modo_envio'      => session('entrega_pedido'),
			        'estado_pedido'   => 'en espera',
			        'fecha_pedido'    => date('Y-n-j H:i:s')
		        ]);

		        if($pedido !== "") {
		        	$id_pedido = $pedido->id; 

    				// Crear detalles del pedido

    				$cart = session('cart');

    				foreach ($cart as $producto) {
			            App\DetallePedido::create([
	    					'id_producto'           => $producto['id'],
					        'id_pedido'             => $id_pedido,
					        'descripcion'           => $producto['descripcion'],
					        'imagen'                => $producto['imagen'],
					        'precio'                => $producto['precio'],
					        'cantidad'              => $producto['cantidad'],
					        'descuento_porcentual'  => $producto['descuento_%'],
					        'tamaño'                => $producto['talla'],
					        'color'                 => $producto['color'],
					        'importe_total'         => 0
	    				]);
			        }
			        
    				// Eliminar carrito de compra

            		session()->forget('cart');
    				
		        	echo true; 
		        }
		        else { echo false; }

			}
			else {
				echo false;
			}
        }
	}
}
