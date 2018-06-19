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

				<div class="contenedor_table facturas_pendientes table table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Fecha de la factura</th>
								<th>Detalles</th>
								<th>Monto</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_sin_pagar">Sin pagar</td>
							</tr>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_sin_pagar">Sin pagar</td>
							</tr>
						</tbody>
					</table>
				</div>

				<h1 class="facturas_titulo mt-2 mt-sm-0">Facturas pagadas</h1>

				<div class="contenedor_table facturas_pagadas table table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Fecha de la factura</th>
								<th>Detalles</th>
								<th>Monto</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_pagadas">Pagada</td>
							</tr>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_pagadas">Pagada</td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>			
		@stop
	<!-- FIN PERFIL -->
</body>
</html>