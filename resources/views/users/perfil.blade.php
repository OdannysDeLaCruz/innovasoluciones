<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Hola, Usuario </title>
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
						<label class="foto_perfil_nombre">Odannys De La Cruz</label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Teléfono</label>
						<label>3005445768 <a href="">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>E-mail</label>
						<label>el_odanis321@hotmail.com <a href="">Cambiar</a></label>
					</div>
				</div>

				<h1 class="perfil_info_titulo">Datos de la cuenta</h1>
				<div class="perfil_info_user">
					<div class="perfil_info_datos_block">
						<label>Usuario</label>
						<label>Odanys_321 <a href="">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Clave</label>
						<label>********** <a href="">Cambiar</a></label>
					</div>
				</div>

				<h1 class="perfil_info_titulo">Datos de envio</h1>
				<div class="perfil_info_user">					
					<div class="perfil_info_datos_block">
						<label>Dirección 1 <small>(Esta será a dirección de envío por defecto)</small></label>
						<label>Cll 6b # 41  36 La Nevada <a href="">Cambiar</a></label>
					</div>
					<div class="perfil_info_datos_block">
						<label>Dirección 2 </label>
						<label>Cll 6b # 41  36 Divino Niño <a href="">Cambiar</a></label>
					</div>
				</div>
			</section>
		@stop
	<!-- FIN PERFIL -->
		
</body>
</html>