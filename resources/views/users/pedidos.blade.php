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
			<section class="col-xs-12 col-sm-9 pl-sm-2 compras">
				<h1 class="compras_titulo mt-5 mt-sm-0">Mis Pedidos</h1>
				
				@if(isset($mis_pedidos))
					@foreach($mis_pedidos as $pedidos)
						<div class="compras_pedido">
						<label class="compras_pedido_fecha">Fecha del pedido: {{ $pedidos['created_at'] }}</label>
						<!-- <label class="compras_pedido_estado">Pedido facturado <i class="fa fa-check-circle"></i></label> -->

						<label class="compras_pedido_info">
							<div class="compras_pedido_info_datos">
								<label class="compras_pedido_info_pedido">
									Pedido N° {{ $pedidos['id'] }}						
								</label>
								<label class="compras_pedido_info_direccion">
									<strong> Dirección de envio: </strong> 
									{{ $pedidos['direccion_envio'] }}
								</label>
								<label class="compras_pedido_info_metodo">
									<strong> Metodo de pago: </strong>
									 {{ $pedidos['metodo_pago'] }}
								</label>
								<label class="compras_pedido_info_codigo">
									<strong> Codigos de descuento : </strong>
									Ninguno
								</label>
								<!-- <label class="compras_pedido_info_total">
									<strong> Total pago: </strong>
									 $ {{ $pedidos['total_pago'] }}
								</label> -->
								<label class="compras_pedido_info_detalles"> 
									<a href="/perfil/pedidos/{{ $pedidos['id'] }}"> 
										<strong> Ver detalles </strong>
									</a>
								</label>	
							</div>
						</label>
					</div>
					@endforeach
				@endisset
			</section> 
		@stop
	<!-- FIN PERFIL -->
</body>
</html>