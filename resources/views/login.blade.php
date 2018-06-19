<!DOCTYPE html>
<html lang="es">
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
	
	<!-- SECCION DE FORMULARIO DE LOGIN -->
	<div class="contenedor_registro">
		<form class="form_registro" action="/perfil.php" method="post">
			<figure>
				<img class="form_registro_logo" src="img/logos/LogoInnova.svg">
			</figure>
			<h1 class="form_registro_titulo">Hola bienvenido, es un gusto tenerte aquí nuevamente.</h1>
			<div class="form_registro_grupo">

				<label for="email" class="texto">Email</label>
				<input id="email" type="email" class="email" name="email" placeholder="Digite su correo electrónico" required>

				<label for="password" class="texto">Contraseña</label>
				<input id="password" type="password" class="password" name="password" placeholder="Digite su contraseña" required>

				<button type="submit" class="btn_registrarse">Entrar</button>

				<label class="recordar_password">
					<a href="terminos">Olvidé mi contraseña</a>
				</label>
				<label class="ya_tengo_cuenta">
					<p>Aun no tengo una cuenta <a href="/register.php">Registrarme</a></p>
					
				</label>
			</div>
		</form>
	</div>
	<!-- FIN SECCION DE FORMULARIO DE LOGIN -->

	
	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>
</body>
</html>