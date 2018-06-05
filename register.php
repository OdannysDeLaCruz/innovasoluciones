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
	<section class="carrito_desplegable">
		<section class="carrito table table-responsive">
			<table class="table table-hover">
			  	<thead>
				    <tr class="carrito_titulo">
				      <th>Imagen</th>
				      <th>Productos</th>
				      <th>Cantidad</th>
				      <th>Precio</th>
				      <th></th>
				    </tr>
			  	</thead>
			  	<tbody>
				    <tr class="carrito_fila">
				      	<td scope="row">
				      		<img class="carrito_fila_img" src="img/zapatos.jpg" alt="">
				      	</td>
				      	<td class="carrito_fila_titulo">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
				      	<td>
				      		<input type="number" min="0" max="10" value="1">
				      	</td>
				      	<td class="carrito_fila_precio"><i>$ 100.000 COP</i></td>
				      	<td class="carrito_fila_borrar"><span class="fa fa-trash-o"></span></td>
				    </tr>
				    <tr class="carrito_fila">
				      	<td scope="row">
				      		<img class="carrito_fila_img" src="img/celular.jpg" alt="">
				      	</td>
				      	<td class="carrito_fila_titulo">Lorem ipsum dolor sit amet.</td>
				      	<td>
				      		<input type="number" min="0" max="10" value="1">
				      	</td>
				      	<td class="carrito_fila_precio"><i>$ 150.000 COP</i></td>
				      	<td class="carrito_fila_borrar"><span class="fa fa-trash-o"></span></td>
				    </tr>
				    <tr class="carrito_fila">
				      	<td scope="row">
				      		<img class="carrito_fila_img" src="img/celular.jpg" alt="">
				      	</td>
				      	<td class="carrito_fila_titulo">Lorem ipsum dolor sit amet.</td>
				      	<td>
				      		<input type="number" min="0" max="10" value="1">
				      	</td>
				      	<td class="carrito_fila_precio"><i>$ 150.000 COP</i></td>
				      	<td class="carrito_fila_borrar"><span class="fa fa-trash-o"></span></td>
				    </tr>
				    <tr class="carrito_fila">
				      	<td scope="row">
				      		<img class="carrito_fila_img" src="img/celular.jpg" alt="">
				      	</td>
				      	<td class="carrito_fila_titulo">Lorem ipsum dolor sit amet.</td>
				      	<td>
				      		<input type="number" min="0" max="10" value="1">
				      	</td>
				      	<td class="carrito_fila_precio"><i>$ 150.000 COP</i></td>
				      	<td class="carrito_fila_borrar"><span class="fa fa-trash-o"></span></td>
				    </tr>
			  	</tbody>
			</table>
			
			<label class="carrito_botones">
				<div class="btn_carrito_vaciar botones_innova">
					<a href=""><span class="fa fa-trash-o"></span> Vaciar carrito</a>
				</div>
				<div class="btn_carrito_pagar botones_innova">
					<a href="/payment.php"><span class="fa fa-credit-card-alt"></span> Pagar</a>
				</div>
			</label>
		</section>
	</section>
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
	<!-- SECCION DE FORMULARIO DE REGISTRO -->
	<div class="contenedor_registro">
		<form class="form_registro" action="" method="post">
			<figure>
				<img class="form_registro_logo" src="img/logos/LogoInnova.svg">
			</figure>
			<h1 class="form_registro_titulo">Hola, registrate para empezar a comprar.</h1>
			<div class="form_registro_grupo">
				<label for="nombre_completo" class="texto">Nombre completo</label>
				<input id="nombre_completo" type="text" class="nombre_completo" name="nombre_completo" required>

				<label for="email" class="texto">Email <small clsas><b>(Este será usuario de ingreso)</b></small></label>
				<input id="email" type="email" class="email" name="email" required>
				<small>No compartiremos este email con nadie mas</small>

				<label for="password" class="texto">Contraseña</label>
				<input id="password" type="password" class="password" name="password" required>

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