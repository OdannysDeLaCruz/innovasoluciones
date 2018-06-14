<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Register | Innova Soluciones </title>
</head>
<body>
	
	<?php include_once('header.php'); ?>	
	<?php include_once('carrito.php'); ?>
	
	<!-- SECCION DE FORMULARIO DE REGISTRO -->
	<div class="contenedor_registro">
		<form class="form_registro" action="" method="post">
			<figure>
				<img class="form_registro_logo" src="img/logos/LogoInnova.svg">
			</figure>
			<h1 class="form_registro_titulo">Hola, registrate para empezar a comprar.</h1>
			<div class="form_registro_grupo">
				<label for="nombre_completo" class="texto">Nombre completo</label>
				<input id="nombre_completo" type="text" class="nombre_completo" name="nombre_completo" required placeholder="Ej: Juan Perez">

				<label for="telefono" class="texto">Teléfono</label>
				<input id="telefono" type="tel" class="telefono" name="telefono" placeholder="Digite un numero de celular o teléfono">

				<label for="email" class="texto">Email <small clsas><b>(Este será usuario de ingreso)</b></small></label>
				<input id="email" type="email" class="email" name="email" required placeholder="Ej: example@hotmail.com, example@gmail.com">
				<small>No compartiremos este email con nadie mas</small>

				<label for="password" class="texto">Contraseña</label>
				<input id="password" type="password" class="password" name="password" min="6" max="15" required>

				<label class="aceptar_terminos">
					<input type="checkbox" class="terminos_condiciones" name="terminos_condiciones">
					Aceptar <a href="terminos">Terminos y Condiciones</a>
				</label>
				<button type="submit" class="btn_registrarse">Registrarme</button>
				<label class="ya_tengo_cuenta">
					<p>Ya tengo una cuenta <a href="/login.php">Iniciar sesión</a></p>
					
				</label>
			</div>
		</form>
	</div>

	<!-- FIN SECCION DE FORMULARIO DE REGISTRO -->

	
	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>
</body>
</html>