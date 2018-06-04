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
				<li><a href="/cart"><span class="fa fa-cart-plus carrito"></span></a></li>
			</ul>
		</nav>
		<span class="fa fa-bars abrir_menu"></span>
	</header>
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
	<div class="detalle_fondo_img">
		<img src="img/detalle_fondo.jpg">
	</div>
	<section class="detalle row">
		<h1 class="col-12">Detalles del producto</h1>
		<div class="detalle_descripcion_img col-md-6">
			<div id="detalle_visializador">
				<img src="img/celular.jpg">				
			</div>
			<div class="detalle_descripcion_img_lista_img">
				<img src="img/computadoras.png" alt="imganes de descripcion">
				<img src="img/computadoras.png" alt="imganes de descripcion">
				<img src="img/computadoras.png" alt="imganes de descripcion">
				<img src="img/computadoras.png" alt="imganes de descripcion">
				<img src="img/computadoras.png" alt="imganes de descripcion">
				<img src="img/computadoras.png" alt="imganes de descripcion">
			</div>
		</div>
		<section class="detalle_info col-md-6">
			<h1 class="detalle_info_titulo">Lorem ipsum dolor sit amet, consectetur adipisicing.</h1>
			<p class="detalle_info_descripcion">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, eaque!</p>
			<span class="detalle_info_precio">$ 1.200.000 COP</span>
			
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