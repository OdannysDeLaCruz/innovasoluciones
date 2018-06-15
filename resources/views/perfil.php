<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Hola, Usuario </title>
</head>
<body>

	<?php include_once('header.php'); ?>
	
	<section class="contenedor_perfil">
		<section class="perfil row">
			<nav class="col-xs-12 col-sm-3 perfil_menu">
				<ul class="perfil_menu_ul">
					<li><a class="active" href="/perfil.php">Perfil</a></li>
					<li><a href="/compras.php">Compras</a></li>
					<li><a href="/facturas.php">Facturas</a></li>
				</ul>
			</nav>
			<section class="col-xs-12 col-sm-9 pl-sm-2 perfil_info">
				<h1 class="perfil_info_titulo mt-5 mt-sm-0">Datos personales</h1>
				<div class="perfil_info_user">
					<div class="perfil_info_datos_block foto_perfil">
						<img class="perfil_info_user_img" src="img/reloj.jpg">
						<label class="foto_perfil_nombre">Odannys De La Cruz</label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Teléfono</label>
						<label>3005445768 <a href="">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>E-mail</label>
						<label>el_odanis321@hotmail.com <a href="">Cambiar</a></label>
					</div>
				</div>

				<h1 class="perfil_info_titulo">Datos de la cuenta</h1>
				<div class="perfil_info_user">
					<div class="perfil_info_datos_block">
						<label>Usuario</label>
						<label>Odanys_321 <a href="">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Clave</label>
						<label>********** <a href="">Cambiar</a></label>
					</div>
				</div>

				<h1 class="perfil_info_titulo">Datos de envio</h1>
				<div class="perfil_info_user">					
					<div class="perfil_info_datos_block">
						<label>Dirección 1 <small>(Esta será a dirección de envío por defecto)</small></label>
						<label>Cll 6b # 41  36 La Nevada <a href="">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Dirección 2 </label>
						<label>Cll 6b # 41  36 Divino Niño <a href="">Cambiar</a></label>
					</div>
				</div>
			</section>
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