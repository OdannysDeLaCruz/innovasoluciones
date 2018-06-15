<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Detalles del producto | Innova Soluciones </title>
</head>
<body>
	
	<?php include_once('header.php'); ?>	
	<?php include_once('carrito.php'); ?>
	<?php include_once('menu_categorias.php'); ?>
	
	<div class="detalle_fondo_img">
		<img src="img/detalle_fondo.jpg">
	</div>
	<section class="detalle row">
		<h1 class="col-12 detalle_titulo">Detalles del producto</h1>
		<div class="detalle_descripcion_img col-md-6">
			<div id="detalle_visualizador"></div>
			<div class="detalle_descripcion_img_lista_img">				
				<img class="lista_img" src="img/camara.jpg" alt="imganes de descripcion">
				<img class="lista_img" src="img/celular.jpg" alt="imganes de descripcion">
				<img class="lista_img" src="img/reloj.jpg" alt="imganes de descripcion">
				<img class="lista_img" src="img/zapatos.jpg" alt="imganes de descripcion">
			</div>
		</div>
		<section class="detalle_info col-md-6">
			<h1 class="detalle_info_titulo">Lorem ipsum dolor sit amet, consectetur adipisicing.</h1>
			<p class="detalle_info_descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, eaque!</p>
			<span class="detalle_info_precio">$ 1.200.000 COP</span>
			
			<!-- OPCIONAL SI ES ALGUN ARTICULO QUE REQUIERA DE TALLAS, COMO ZAPATOS, CAMISAS ETC -->
			<select id="tallas" name="tallas" class="detalle_info_tallas">
				<option>Escoje una talla</option>
				<option value="28">28</option>
				<option value="30">30</option>
				<option value="32">32</option>
			</select>

			<div class="detalle_info_btn_comprar botones_innova">
				<a href="">Comprar</a>
			</div>
		</section>

	</section>
	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>
</body>
</html>