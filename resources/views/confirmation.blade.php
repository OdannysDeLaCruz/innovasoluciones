<?php

if(strlen($datos)>0){
	$filename = "pruebas.txt";
	$fp = fopen($filename, "a");
	if($fp) {
		fwrite($fp, $datos, strlen($datos));
	fclose($fp);

	}
}

// Elimino todos los datos de session con respecto al carrito de compra
session()->forget('cart');
session()->forget('codigos_usados');				
session()->forget('descuento_peso');				
session()->forget('notificacion_codigo');

