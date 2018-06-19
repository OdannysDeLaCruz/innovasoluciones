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
		@section('compras') active @stop
		@section('content')
			<section class="col-xs-12 col-sm-9 pl-sm-2 compras">
				<h1 class="compras_titulo mt-5 mt-sm-0">Compras</h1>
				<div class="compras_pedido">
					<label class="compras_pedido_fecha">Fecha del pedido: 14/06/2018</label>
					<label class="compras_pedido_estado">Compra finalizada</label>
					<label class="compras_pedido_info">
						<img class="compras_pedido_info_img" src="img/reloj.jpg"></img>
						<div class="compras_pedido_info_datos">
							<label class="compras_pedido_info_nombre">Celular Samsung Galaxy J7 Prime Lte Ds - 32 Gb Blanco Dorado</label>
							<label class="compras_pedido_info_monto">$ 723.000 x 1 unidad</label>	
						</div>
					</label>
				</div>
				<div class="compras_pedido">
					<label class="compras_pedido_fecha">Fecha del pedido: 14/06/2018</label>
					<label class="compras_pedido_estado">Compra finalizada</label>
					<label class="compras_pedido_info">
						<img class="compras_pedido_info_img" src="img/celular.jpg"></img>
						<div class="compras_pedido_info_datos">
							<label class="compras_pedido_info_nombre">Celular Samsung Galaxy J7 Prime Lte Ds - 32 Gb Blanco Dorad</label>
							<label class="compras_pedido_info_monto">$ 799.000 x 1 unidad</label>	
						</div>
					</label>
				</div>
			</section> 
		@stop
	<!-- FIN PERFIL -->
</body>
</html>