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

			@foreach($productos as $producto)
				<section class="producto">
					<figure>
						<img src="{{ $producto['imagen'] }}" class="producto_img" alt="{{ $producto['descripcion'] }}">
					</figure>
					<h1 class="producto_titulo"> {{ $producto['descripcion'] }}</h1>
					<label class="producto_precio">$ {{ $producto['precio'] }} COP</label>
					<label class="producto_botones">
						<div class="botones_innova">
							<a href="productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">Detalles</a>
						</div>
						<div class="botones_innova">
							<a href="">Comprar</a>
						</div>
					</label>
				</section>	
			@endforeach
			
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