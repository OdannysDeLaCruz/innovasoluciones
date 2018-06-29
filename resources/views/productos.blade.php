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
		<span class="seccion_productos_logo">
			<div class="contenedor_logo">
				<img class="logo" src="{{asset('img/logos/LogoInnovate.svg')}}">					
			</div>
		</span>
		<div class="seccion_productos_content">

			@if(isset($productos))
				@foreach($productos as $producto)
					<section class="producto">
						<figure>
							<a href="/productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">
								<img src="{{ $producto['imagen'] }}" class="producto_img" alt="{{ $producto['descripcion'] }}">							
							</a>
						</figure>
						<div class="producto_info">
							<a href="/productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">
								<h1 class="producto_titulo"> {{ $producto['descripcion'] }}</h1>
							</a>
							<label class="producto_precio">$ {{ $producto['precio'] }} COP</label>					
						</div>
						<!-- <label class="producto_botones"> -->
							<!-- <div class="botones_innova btn_producto">
								<a href="/productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">Detalles</a>
							</div> -->
							<!-- <div class="botones_innova btn_producto">
								<a href="">Comprar</a>
							</div> -->
						<!-- </label> -->
					</section>	
				@endforeach
		</div>
			@else 
				<div class="respuesta">
					<img src="{{asset('img/logos/svg/box.svg')}}">
					<p>
						{{ $response }} <br>
						Ver otras categorias de <a href="/productos">productos</a>
					</p>
				</div>
			@endif
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