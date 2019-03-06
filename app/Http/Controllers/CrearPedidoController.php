<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CrearPedidoController extends Controller
{
	public function crearPedido(Request $request) {

    	// Verificar si app.js envía una peticion ajax para crear el pedido
		if($request->ajax()) {
    		// Crear el pedido
			if ($_POST["crear"] == true) {

				

			}
    		// Crear detalles del pedido
            // session()->forget('cart');
        }
	}
    // Eliminar carrito de compra 
}
