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
					Pedido N° {{ $idPedido }}
				</h1>
		
				@isset($compras)
					@foreach( $compras as $compra )
						<div class="compras_pedido">
							<!-- <label class="compras_pedido_estado">Compra finalizada</label> -->

							<label class="compras_pedido_info">
								<a href="/productos/{{ $compra['id'] }}-{{ $compra['descripcion'] }}">
									<img class="compras_pedido_info_img" src="{{ $compra['imagen'] }}"></img>
								
								</a>
								<div class="compras_pedido_info_datos">
									<a href="/productos/{{ $compra['id'] }}-{{ $compra['descripcion'] }}">
										<label class="compras_pedido_info_nombre">{{ $compra['descripcion'] }}</label>
									</a>
									<label class="compras_pedido_info_monto">$ {{ $compra['precio'] }} x {{ $compra['cantidad'] }} unidad</label>

									<label class="compras_pedido_info_monto">
									Total: $ {{ $compra['precio'] * $compra['cantidad'] }} </label>	
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