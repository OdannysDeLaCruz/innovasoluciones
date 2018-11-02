<?php
if ($datos) {

	// Elimino todos los datos de session con respecto al carrito de compra
	session()->forget('cart');
	session()->forget('codigos_usados');				
	session()->forget('descuento_peso');				
	session()->forget('notificacion_codigo');
}
