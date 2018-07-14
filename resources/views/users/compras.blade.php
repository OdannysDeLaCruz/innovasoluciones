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
				<h1 class="compras_titulo mt-5 mt-sm-0">
					Pedido N° {{ $idPedido }}, 
					<span class="compras_titulo_total">
						@isset($total_pedido)
							Valor del pedido: $ {{ $total_pedido }}
						@endisset
					</span>
				</h1>
		
				@isset($detalle_pedidos)
					@foreach( $detalle_pedidos as $detalle )
						<div class="compras_pedido">
							<!-- <label class="compras_pedido_estado">Compra finalizada</label> -->

							<label class="compras_pedido_info">
								<a target="_blanc" href="/productos/{{ $detalle['id_producto'] }}-{{ $detalle['descripcion'] }}">
									<img class="compras_pedido_info_img" src="{{ $detalle['imagen'] }}"></img>
								
								</a>
								<div class="compras_pedido_info_datos">
									<a target="_blanc" href="/productos/{{ $detalle['id_producto'] }}-{{ $detalle['descripcion'] }}">
										<label class="compras_pedido_info_nombre">{{ $detalle['descripcion'] }}</label>
									</a>
									<label class="compras_pedido_info_monto">
										$ {{ $detalle['precio'] }} x {{ $detalle['cantidad'] }} unidad, 
										<b>{{ $detalle['descuento_porcentual'] }} % desc</b></label>

									<label class="compras_pedido_info_monto">
									Total: $ {{ $detalle['importe_total'] }} </label>	
								</div>
							</label>
						</div>
					@endforeach
				@endisset
				<!-- si no existe compra, es por que la idPedido no existe para este usuario, verificamos si existe la variable Error -->
				@isset($Error)
					<div class="compras_pedido">
						<label class="compras_pedido_error">{{ $Error }}</label>
					</div>
				@endisset
			</section> 
		@stop
	<!-- FIN PERFIL -->
</body>
</html>