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
	@yield('script-local')
	<!-- Verison 5.8.2 de Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	
	<!-- Theme included stylesheets -->
	<!-- <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> -->
	<!-- <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet"> -->
	<!-- Core build with no theme, formatting, non-essential modules -->
	<!-- <link href="//cdn.quilljs.com/1.3.6/quill.core.css" rel="stylesheet"> -->

	<!-- Librería Editor.js -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/editor.css') }}">

	<title> @yield('title') | Innova Soluciones</title>
</head>
<body>
	<section class="contenedor_panel_admin row">
		<!-- SECCION MENU LATERAL ADMIN -->
		@include('admin/modulos/menu_lateral_admin')
		<!-- FIN MENU LATERAL ADMIN -->

		<!-- SECCION CONTENIDO PRINCIPAL -->
		@yield('contenido')
		<!-- FIN CONTENIDO PRINCIPAL -->
		
	</section>

	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>