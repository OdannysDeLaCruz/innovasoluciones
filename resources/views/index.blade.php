<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title>Innova Soluciones | Home </title>
</head>
<body>
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION CARRITO -->
	@include('includes/carrito')
	<!-- FIN CARRITO -->	

	<!-- SECCION CARRUSEL -->
	@include('includes/carrusel')	
	<!-- FIN CARRUSEL -->

	<!-- SECCION CATEGORIAS -->
	@include('includes/secciones')
	<!-- FIN CATEGORIAS -->

	<!-- SECCION NUEVOS PRODUCTOS -->
	@include('includes/nuevos_productos')	
	<!-- FIN NUEVOS PRODUCTOS -->

	<!-- SECCION ALGUNOS PRODUCTOS -->
	@include('includes/algunos_productos')	
	<!-- FIN ALGUNOS PRODUCTOS -->

	<!-- SECCION PUBLICIDAD -->
	@include('includes/publicidad')	
	<!-- FIN PUBLICIDAD -->

	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
	
</body>
</html>