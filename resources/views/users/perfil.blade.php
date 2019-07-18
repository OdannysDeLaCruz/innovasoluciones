<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Hola, {{ Auth::user()->usuario_nombre }} </title>
</head>
<body>

	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION PERFIL -->
	@extends('users/layout')
		@section('perfil') active @stop
		@section('content')
			<section class="col-xs-12 col-sm-10 perfil_info">
				<h1 class="perfil_info_titulo mt-2 mb-4">Datos personales</h1>
				<form class="perfil_info_user" action="" method="post">
					{{ csrf_field() }}
					<div class="perfil_info_datos_block foto_perfil">
						<div class="foto_perfil_contenedor">
							<div class="foto_perfil_contenedor_img">
								<img src="{{ asset('uploads/avatars/avatar.png') }}">			
							</div>
						</div>							
						<label class="foto_perfil_nombre"> {{ Auth::user()->usuario_nombre }} {{ Auth::user()->usuario_apellido }} </label>
					</div>
					<!-- Telefono e Email -->
					<div class="perfil_info_datos_block bloque_telefono_email">
						<label class="titulo_item">Teléfono</label>
						<input class="input_item imput_item_telefono" type="text" name="" value="{{ Auth::user()->usuario_telefono }}">
						<label class="titulo_item">Correo electrónico</label>
						<input class="input_item imput_item_email" type="text" name="" value="{{ Auth::user()->email }}">
						<input class="btn btn-primary btn_actualizar btn_actualizar_datosPersonales" type="submit" value="Actualizar">
					</div>
				</form>

				<h1 class="perfil_info_titulo">Datos de la cuenta</h1>
				<!-- Formulario para cambiar los datos de la cuenta (usuario de ingreso y clave de acceso) -->
				<form class="perfil_dato_cuenta" action="" method="post">
					{{ csrf_field() }} 

					<!-- Usuario de ingreso -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_usuario">Usuario de ingreso</label>
						<input class="input_item imput_item_usuario" type="text" name="usuario_ingreso_nuevo" value="{{ Auth::user()->email }}">
					</div>
					<!-- Clave de ingreso -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_password">Clave</label>
						<input class="input_item imput_item_password" type="text" name="usuario_pass_nuevo" placeholder="¿Deseas cambiarla?">
					</div>
					<div class="perfil_info_datos_block">
						<input class="btn btn-primary btn_actualizar btn_actualizar_datosCuenta" type="submit" value="Actualizar">
					</div>
				</form>

				<h1 class="perfil_info_titulo">Datos de dirección <small>(Dirección por defecto para tus envíos)</small></h1>
				<form class="perfil_datos_envio" action="" method="post">
					{{ csrf_field() }} 

					<!-- Pais -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_pais">País / Región</label>
						<input class="input_item imput_item_pais" type="text" name="usuario_pais_nuevo" value="{{ Auth::user()->direccion()->value('pais') }}">
					</div>
					<!-- Depart / Estado / Provincia -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_estado">Depart / Estado / Provincia</label>
						<input class="input_item titulo_item_estado" type="text" name="usuario_estado_nuevo" value="{{ Auth::user()->direccion()->value('departamento') }}">
					</div>
					<!-- Ciudad -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_ciudad">Ciudad</label>
						<input class="input_item imput_item_ciudad" type="text" name="usuario_ciudad_nuevo" value="{{ Auth::user()->direccion()->value('ciudad') }}">
					</div>
					<!-- Barrio -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_barrio">Barrio</label>
						<input class="input_item imput_item_barrio" type="text" name="usuario_barrio_nuevo" value="{{ Auth::user()->direccion()->value('barrio') }}">
					</div>
					<!-- Calle -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_calle">Calle</small></label>
						<input class="input_item imput_item_calle" type="text" name="usuario_calle_nuevo" value="{{ Auth::user()->direccion()->value('calle') }}">
					</div>
					<!-- Numero Calle -->
					<div class="perfil_info_datos_block">
						<label class="titulo_item titulo_item_num_calle">N° Calle</small></label>
						<input class="input_item imput_item_num_calle" type="text" name="usuario_num_calle_nuevo" value="{{ Auth::user()->direccion()->value('numero') }}">
					</div>
					<!-- Codigo postal -->
					<div class="perfil_info_datos_block perfil_info_datos_postal">
						<label class="titulo_item titulo_item_num_postal">Cod. Postal</small></label>
						<input class="input_item imput_item_postal" type="number" name="usuario_postal_nuevo" value="{{ Auth::user()->direccion()->value('codigo_postal') }}">
					</div>
					<div class="perfil_info_datos_block">
						<input class="btn btn-primary btn_actualizar btn_actualizar_datosEnvios" type="submit" value="Actualizar">
					</div>
				</form>
			</section>
		@stop
	<!-- FIN PERFIL -->
		
</body>
</html>