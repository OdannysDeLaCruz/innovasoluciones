<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Productos | Innova Soluciones</title>
</head>
<body>
	<header class="header_principal">
		<a class="header_principal_img" href="/">
			<img src="img/logos/LogoInnova.svg" alt="Logotipo de Innova Soluciones">
		</a>
		<div class="contenedor_formulario">
			<form class="formulario_buscar_producto" action="/search" method="post">
				<input class="input_buscador_producto" type="text" name="buscar" placeholder="Busca por categorias" required>
				<button class="btn_buscar" type="submit"><span class="fa fa-search"></span></button>
			</form>
		</div>
		<nav class="nav_principal">
			<span class="fa fa-times cerrar_menu" id="cerrar_menu"></span>
			<ul>
				<li><a href="/">Home</a></li>
				<li><a href="/productos.php">Productos</a></li>
				<li><a href="/login.php">Entrar</a></li>
				<li><a href="/register.php">Registrarse</a></li>
			</ul>
		</nav>
		<span id="carrito_icono" class="fa fa-cart-plus carrito_icono"></span>
		<span class="fa fa-bars abrir_menu"></span>
	</header>

	<?php include_once('carrito.php'); ?>
	
	<!-- SECCION NAV CATEGORIAS -->
	<nav class="nav_categorias">
		<a href="#">Innovate Zapatos</a>
		<a href="#">Innovate Celulares</a>
		<a href="#">Innovate Joyas</a>
		<a href="#">Innovate computadores</a>
		<a href="#">Innovate computadores</a>
		<a href="#">Innovate computadores</a>
		<a href="#">Innovate joyas</a>
		<a href="#">Innovate otras</a>
		<a href="#">Innovate otras</a>
		<a href="#">Innovate mas</a>
		<a href="#">Innovate mas</a>
		<a href="#">Innovate joyas</a>
	</nav>
	<!-- FIN SECCION NAV CATEGORIAS -->
	<!-- SECCION PRODUCTOS -->
	<section class="seccion_productos">
		<div class="seccion_productos_content">
			<span class="seccion_productos_logo">
				<div class="contenedor_logo">
					<img class="logo" src="img/logos/LogoInnovate.svg">					
				</div>
			</span>
			<section class="producto">
				<figure>
					<img src="img/celular.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/computadoras.png" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/zapatos.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/camara.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/tv.png" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/reloj.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/zapatos.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/reloj.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/tv.png" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/reloj.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/zapatos.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
			<section class="producto">
				<figure>
					<img src="img/reloj.jpg" class="producto_img">
				</figure>
				<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
				<label class="producto_precio">$999.999.00</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="/detalles.php">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
		</div>
	</section>
	<!-- FIN SECCION PRODUCTOS -->
	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>

</body>
</html>