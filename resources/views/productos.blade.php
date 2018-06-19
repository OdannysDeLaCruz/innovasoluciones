<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Productos | Innova Soluciones</title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->
	
	<!-- SECCION CARRITO -->
	@include('includes/carrito')
	<!-- FIN CARRITO -->

	<!-- SECCION CATEGORIAS -->
	@include('includes/menu_categorias')	
	<!-- FIN CATEGORIAS -->
	
	<!-- SECCION PRODUCTOS -->
	<section class="seccion_productos">
		<div class="seccion_productos_content">
			<span class="seccion_productos_logo">
				<div class="contenedor_logo">
					<img class="logo" src="img/logos/LogoInnovate.svg">					
				</div>
			</span>

			@for( $i = 1; $i <= 15; $i ++ )
				<section class="producto">
					<figure>
						<img src="img/celular.jpg" class="producto_img">
					</figure>
					<h1 class="producto_titulo">Lorem ipsum dolor sit amet</h1>
					<label class="producto_precio">$999.999.00</label>
					<label class="producto_botones">
						<div class="botones_innova">
							<a href="{{ route('productos') }}/{{ $i }}">Detalles</a>
						</div>
						<div class="botones_innova">
							<a href="">Comprar</a>
						</div>
					</label>
				</section>				
			@endfor
			<!-- <section class="producto">
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
			</section> -->
		</div>
	</section>
	<!-- FIN SECCION PRODUCTOS -->
	
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>