<?php 
$d = session('cart');			
$d = $d[1]['descripcion'];

// $datos = print_r($d,true);
$fp = fopen('pruebas.txt', "a");
if( is_string($d) ) {
	fwrite($fp, "Cart: $d \r\n");
	fclose($fp);
}
else {
	fwrite($fp, "Algo anda mal \r\n");
	fclose($fp);
}

?>
<!-- <form class="form_registro" method="POST" action="{{ route('confirmation') }}"> -->
    <!-- @csrf -->

    <!-- <label>Usuario</label>
	<input type="text" name="user">

    <input type="submit">

</form> -->