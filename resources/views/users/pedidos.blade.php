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
			<section class="col-xs-12 col-md-10 pedidos_users">
				<h1 class="perfil_info_titulo mt-2 mb-4">Pedidos</h1>
				@if($mis_pedidos)
					@foreach($mis_pedidos as $pedido)
						<div class="pedidos">
							<header class="pedidos_cabecera">
								<span class="numero_pedidos">Ref. {{ $pedido->pedido_ref_venta }}</span>
								<span class="fecha_pedidos">@dateformat( $pedido->fecha_transaccion)</span>		
							</header>
							<span class="pedidos_info">
								<div class="pedidos_info_datos">
									<!-- <span class="pedidos_info_datos_items pedidos_direccion">
										<span class="items_titulo"> Dirección de envío </span> 
										{{ $pedido['pedido_dir'] }}
									</span>
									<span class="pedidos_info_datos_items pedidos_referencia">
										<span class="items_titulo"> Referencia de venta </span>
										 {{ $pedido['pedido_ref_venta'] }}
									</span> -->
									@if($pedido['promo_nombre'] != null)
										<span class="pedidos_info_datos_items pedidos_codigo_promocion">
											<span class="items_titulo"> Código de promoción </span>
											<span class="items-texto">												
													{{ $pedido['promo_nombre'] }}
											</span>
										</span>
									@endif
									<span class="pedidos_info_datos_items pedidos_estado">
										<span class="items_titulo"> Estado transacción</span>
										@if($pedido['estado'] == 0 || $pedido['estado'] == '')
											<p class="estados pedidos_estado_espera"> {{ "En espera" }} </p>
										@elseif($pedido['estado'] == 4)
											<p class="estados pedidos_estado_aprovada"> {{ "Aprovada" }} </p>	
										@elseif($pedido['estado'] == 6) 
											<p class="estados pedidos_estado_declinada"> {{ "Declinada" }} </p>
										@elseif($pedido['estado'] == 5)
											<p class="estados pedidos_estado_expirada"> {{ "Expirada" }} </p>
										@endif
									</span>
									<span class="pedidos_info_datos_items pedidos_detalles"> 
										<a href="/perfil/pedidos/{{ $pedido['id'] }}"> Ver detalles</a>
									</span>	
								</div>
							</span>
						</div>
					@endforeach
				@else
					<p>Aún no realizado ningún pedido</p>
				@endif
			</section> 
		@stop
	<!-- FIN PERFIL -->
</body>
</html>