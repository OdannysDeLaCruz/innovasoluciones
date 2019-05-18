<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Compras realizadas | Usuario </title>
</head>
<body>

	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->
	
	<!-- SECCION PERFIL -->
	@extends('users/layout')
		@section('pedidos') active @stop
		@section('content')
			<section class="col-xs-12 col-sm-9 pl-sm-2 pedidos_users">
				<h1 class="titulo_seccion mt-2 mb-4">Pedidos</h1>
				
				@if(isset($mis_pedidos))
					@foreach($mis_pedidos as $pedido)
						<div class="pedidos">
							<header class="pedidos_cabecera">
								<span class="numero_pedidos">Pedido N° {{ $pedido['id'] }}</span>
								<span class="fecha_pedidos">Fecha del pedido: {{ $pedido['fecha_creado'] }}</span>						
							</header>
							<span class="pedidos_info">
								<div class="pedidos_info_datos">
									<span class="pedidos_info_datos_items pedidos_direccion">
										<span class="items_titulo"> Dirección de envío </span> 
										{{ $pedido['pedido_dir'] }}
									</span>
									<span class="pedidos_info_datos_items pedidos_referencia">
										<span class="items_titulo"> Referencia de venta </span>
										 {{ $pedido['pedido_ref_venta'] }}
									</span>
									<span class="pedidos_info_datos_items pedidos_codigo_promocion">
										<span class="items_titulo"> Código de promoción </span>
										@if($pedido['promo_nombre'] != null)
											{{ $pedido['promo_nombre'] }}
										@else 
											{{ "Ningúno" }}
										@endif
									</span>
									<span class="pedidos_info_datos_items pedidos_estado">
										<span class="items_titulo"> Estado </span>
										@if($pedido['estado'] == 0 || $pedido['estado'] == '')
											<p class="estados pedidos_estado_espera"> {{ "En espera" }} </p>
										@elseif($pedido['estado'] == 4)
											<p class="estados pedidos_estado_aprovado"> {{ "Aprovado" }} </p>	
										@elseif($pedido['estado'] == 6) 
											<p class="estados pedidos_estado_rechazado"> {{ "Rechazado" }} </p>
										@elseif($pedido['estado'] == 5)
											<p class="estados pedidos_estado_declinado"> {{ "Declinado" }} </p>
										@endif
									</span>
									<span class="pedidos_info_datos_items pedidos_detalles"> 
										<a href="/perfil/pedidos/{{ $pedido['id'] }}"> Ver detalles</a>
									</span>	
								</div>
							</span>
						</div>
					@endforeach
				@endisset
			</section> 
		@stop
	<!-- FIN PERFIL -->
</body>
</html>