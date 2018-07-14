<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Facturas | Usuario </title>
</head>
<body>

	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION PERFIL -->
	@extends('users/layout')
		@section('facturas') active @stop
		@section('content')
			<section class="col-xs-12 col-sm-9 pl-sm-2 facturas">
				<h1 class="facturas_titulo mt-5 mt-sm-0">Facturas pendientes</h1>

			@if($pedidos_pendientes !== '')
				<div class="contenedor_table facturas_pendientes table table-responsive">
					
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Fecha de la factura</th>
								<th>Detalles</th>
								<!-- <th>Monto</th> -->
								<th>Estado</th>
							</tr>
						</thead>
					@foreach($pedidos_pendientes as $factura_pendiente)
						<tbody>
							<tr class="facturas_datos">
								<td>{{$factura_pendiente['created_at']}}</td>
								<td><a target="_blanc" href="/perfil/facturas/{{$factura_pendiente['id']}}">Ver</a> | <a href="/perfil/facturas/descargar/{{$factura_pendiente['id']}}">Descargar</a></td>
								<!-- <td>$ 200.000 COP</td> -->
								<td class="facturas_datos_estado_sin_pagar">Sin pagar</td>
							</tr>
						</tbody>
					@endforeach
					</table>
				</div>
			@else
				{{ 'Todo en orden por aquí' }}
			@endif

				<h1 class="facturas_titulo mt-2 mt-sm-0">Facturas pagadas</h1>

			@if($pedidos_pagados !== '')
				<div class="contenedor_table facturas_pagadas table table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Fecha de la factura</th>
								<th>Detalles</th>
								<!-- <th>Monto</th> -->
								<th>Estado</th>
							</tr>
						</thead>
					@foreach($pedidos_pagados as $factura_pagada)
						<tbody>
							<tr class="facturas_datos">
								<td>{{$factura_pagada['created_at']}}</td>
								<td><a target="_blanc" href="/perfil/facturas/{{$factura_pagada['id']}}">Ver</a> | <a href="/perfil/facturas/descargar/{{$factura_pagada['id']}}">Descargar</a></td>
								<!-- <td>$ 200.000 COP</td> -->
								<td class="facturas_datos_estado_pagadas">Pagadas</td>
							</tr>
						</tbody>
					@endforeach
					</table>
				</div>
			@else
				{{ 'Todo en orden por aquí' }}
			@endif
			</section>			
		@stop
	<!-- FIN PERFIL -->
</body>
</html>