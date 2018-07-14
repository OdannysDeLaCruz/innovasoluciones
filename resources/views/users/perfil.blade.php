<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Hola, {{ Auth::user()->nombre }} </title>
</head>
<body>

	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION PERFIL -->
	@extends('users/layout')
		@section('perfil') active @stop
		@section('content')
			<section class="col-xs-12 col-sm-9 pl-sm-2 perfil_info">
				<h1 class="perfil_info_titulo mt-5 mt-sm-0">Datos personales</h1>
				<div class="perfil_info_user">
					<div class="perfil_info_datos_block foto_perfil">
						<img class="perfil_info_user_img" src="img/reloj.jpg">
						<label class="foto_perfil_nombre"> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }} </label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Teléfono</label>
						<label>
							@empty(!Auth::user()->telefono)
								{{ Auth::user()->telefono }} 
								<a href="perfil/actualizar">Cambiar</a>
							@else 
								<a href="perfil/actualizar">Agregar</a>
							@endempty
					</div>
					<div class="perfil_info_datos_block">
						<label>E-mail</label>
						<label>{{ Auth::user()->email }} <a href="perfil/actualizar">Cambiar</a></label>
					</div>
				</div>

				<h1 class="perfil_info_titulo">Datos de la cuenta</h1>
				<div class="perfil_info_user">
					<div class="perfil_info_datos_block">
						<label>Usuario de ingreso</label>
						<label>{{ Auth::user()->email }} <a href="perfil/actualizar">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Clave</label>
						<label>********** <a href="perfil/actualizar">Cambiar</a></label>
					</div>
				</div>

				<h1 class="perfil_info_titulo">Datos de envio</h1>
				<div class="perfil_info_user">					
					<div class="perfil_info_datos_block">
						<label>País</label>
						<label>
							@empty(!Auth::user()->pais)
								{{ Auth::user()->pais }} 
								<a href="perfil/actualizar">Cambiar</a>
							@else 
								<a href="perfil/actualizar">Agregar</a>
							@endempty
					</div>
					<div class="perfil_info_datos_block">
						<label>Ciudad</label>
						<label>
							@empty(!Auth::user()->ciudad)
								{{ Auth::user()->ciudad }} 
								<a href="perfil/actualizar">Cambiar</a>
							@else 
								<a href="perfil/actualizar">Agregar</a>
							@endempty
						</label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Barrio</label>
						<label>
							@empty(!Auth::user()->barrio)
								{{ Auth::user()->barrio }} 
								<a href="perfil/actualizar">Cambiar</a>
							@else 
								<a href="perfil/actualizar">Agregar</a>
							@endempty
						</label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Dirección 1 <small>(Esta será a dirección de llegada de sus pedidos)</small></label>
						<label>
							@empty(!Auth::user()->direccion)
								{{ Auth::user()->direccion }} 
								<a href="perfil/actualizar">Cambiar</a>
							@else 
								<a href="perfil/actualizar">Agregar</a>
							@endempty
						</label>
					</div>
					
				</div>
			</section>
		@stop
	<!-- FIN PERFIL -->
		
</body>
</html>