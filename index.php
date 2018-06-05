<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title>Innova Soluciones | Home </title>
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
	<!-- SECCION CARRUSEL -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  	<ol class="carousel-indicators">
	   	 	<li data-target="#carouselExampleIndicators" data-slide-to="0" class="indicadores active"></li>
	   	 	<li data-target="#carouselExampleIndicators" data-slide-to="1" class="indicadores"></li>
	   		<li data-target="#carouselExampleIndicators" data-slide-to="2" class="indicadores"></li>
	  	</ol>
	  	<div class="carousel-inner">
	    	<div class="carousel-item active">
	    		<a href="/">
	      			<img class="d-block w-100" src="img/carrusel/imagen1.jpg" alt="First slide">	    			
	    		</a>
	    	</div>
	    	<div class="carousel-item">
	    		<a href="/">
	      			<img class="d-block w-100" src="img/carrusel/imagen2.jpg" alt="Second slide">
	    		</a>
	    	</div>
	    	<div class="carousel-item">
	    		<a href="/">
	      			<img class="d-block w-100" src="img/carrusel/imagen3.jpg" alt="Third slide">	    			
	    		</a>
	    	</div>
	  	</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Siguiente</span>
			 </a>
	</div>
	<!-- FIN CARRUSEL -->
	<!-- SECCION CATEGORIAS -->
	<section class="seccion_categorias">
		<label class="seccion_categorias_textos">
			<h1 class="seccion_categorias_titulo">Categorias de productos</h1>
			<a href="/productos.php" class="seccion_categorias_link">Ver mas</a>
		</label>
		<section class="seccion_categorias_items">
			<div class="item">
				<label class="item_img"><img src="img/logos/svg/zapatos.svg"></label>
				<h1 class="item_titulo">Innovate Zapatos </h1>
				<a class="item_link" href="/"></a>
			</div>
			<div class="item">
				<label class="item_img"><img src="img/logos/svg/celular.svg"></label>
				<h1 class="item_titulo">Innovate Celulares </h1>
				<a class="item_link" href="/"></a>
			</div>
			<div class="item">
				<label class="item_img"><img src="img/logos/svg/joyas.svg"></label>
				<h1 class="item_titulo">Innovate Joyas </h1>
				<a class="item_link" href="/"></a>
			</div>
			<div class="item">
				<label class="item_img"><img src="img/logos/svg/pc.svg"></label>
				<h1 class="item_titulo">Innovate computadores</h1>
				<a class="item_link" href="/"></a>
			</div>
				
		</section>
	</section>
	<!-- FIN CATEGORIAS -->
	<!-- SECCION NUEVOS PRODUCTOS -->
	<section class="seccion_nuevos">
		<label class="seccion_categorias_textos">
			<h1 class="seccion_nuevos_titulo">
				PRODUCTOS NUEVOS 
				<span class="estrellas">
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
					<i class="fa fa-star"></i>
				</span>
			</h1>
		</label>
		<div class="seccion_nuevos_carrusel">
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

		</div>
	</section>
	<!-- FIN NUEVOS PRODUCTOS -->
	<!-- SECCION ALGUNOS PRODUCTOS -->
	<section class="seccion_algunos_productos">
		<h1 class="seccion_algunos_productos_titulo">Estos son algunos de nuestros productos</h1>
		<div class="seccion_algunos_productos_content">
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
		</div>
		<div class="btn_seccion_ver_mas botones_innova">
			<a href="/productos">Ver mas productos</a>
		</div>
	</section>
	<!-- FIN ALGUNOS PRODUCTOS -->
	<!-- SECCION PUBLICIDAD -->
	<section class="seccion_publicidad">
		<!-- IMAGEN DE FONDO -->
		<img class="img_fondo_publicidad" src="img/futball.jpg">

		<div class="contenedor_publicidad row">			
			<div class="col-12 col-md-6 seccion_publicidad_mensaje">
				<span class="seccion_publicidad_titulo">ESTRENA TELEVISOR ESTE FIN DE SEMANA</span>
				<span class="seccion_publicidad_texto">TV SAMSUNG</span>
				<span class="seccion_publicidad_precio">$ 999.999.00</span>
					
				<div class="btn_publicidad botones_innova">
					<a href="">Ver detalles</a>
				</div>		
			</div>
			<figure class="col-12 col-md-6 seccion_publicidad_img">
				<img src="img/tv.png" alt="foto del producto">
			</figure>
		</div>
	</section>
	<!-- FIN PUBLICIDAD -->
	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>
</body>
</html>