<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos_admin.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> @yield('title') | Innova Soluciones</title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->


	<section class="contenedor_panel_admin row">
		<!-- SECCION MENU LATERAL ADMIN -->
		@include('admin/modulos/menu_lateral_admin')
		<!-- FIN MENU LATERAL ADMIN -->

		<!-- SECCION CONTENIDO PRINCIPAL -->
		@yield('contenido')
		<!-- FIN CONTENIDO PRINCIPAL -->
		
	</section>


	<!-- SECCION FOOTER -->
	@include('includes/footer')
	<!-- FIN FOOTER -->

	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>