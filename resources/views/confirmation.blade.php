<?php
session_start();
unset($_SESSION['cart']); 
session_destroy();

// if(strlen($datos)>0){
// 	$filename = "pruebas.txt";
// 	$fp = fopen($filename, "a");
// 	fwrite($fp, 'Datos enviados');
// 	fwrite($fp, $datos, strlen($datos));
// 	fclose($fp);
// }


