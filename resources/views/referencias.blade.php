<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" >

	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title>Referencias y descripción del producto | Home </title>
</head>
<body>
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->
	
	<section class="contenido_principal">
		<section class="section_principal">
			<span class="section_principal_titulo"> 
				<a href=""> < </a>
				<h1> {{ $producto['descripcion'] }} </h1>
			</span>
			<a href="{{ route('showDetallesCompra', [ $producto['id'], $producto['descripcion'] ]) }}">
				<button class="section_principal_btncomprar">Información de compra</button>				
			</a>
		</section>
		<section class="section_referencias">
			<!-- @foreach ($imagenes as $imagen)
				<img class="section_referencias_img" src="{{ asset($imagen['nombre_imagen']) }}" alt="{{ $imagen['nombre_imagen'] }}">
	        @endforeach -->
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/1.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/2.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/3.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/4.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/5.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/6.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/7.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/8.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/9.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/10.jpg') }}">
	        <img class="section_referencias_img" src="{{ asset('img/productos/bici/11.jpg') }}">
		</section>
	</section>

	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
	
</body>
</html>