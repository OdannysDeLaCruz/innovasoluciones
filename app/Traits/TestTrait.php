<?php 
namespace App\Traits;

trait TestTrait {

    static function getDatos() {
       // $cart = session('cart');

       if(session()->has('cart')) {
			session()->forget('cart');
			$fp = fopen('pruebas.txt', "a");
			fwrite($fp, "Carrito eliminado \r\n");
			fclose($fp);
		}
		else {
			$fp = fopen('pruebas.txt', "a");
			fwrite($fp, "Al parecer no hay carrito \r\n");
			fclose($fp);
		}
    }
}

?>