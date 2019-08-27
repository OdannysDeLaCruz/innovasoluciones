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
			<section class="col-xs-12 col-md-10 facturas">
				<h1 class="perfil_info_titulo mt-2 mb-4">Mis facturas</h1>

			@if($pedidos !== '')
				<div class="contenedor_table facturas_pendientes table table-responsive">					
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Ref. pedido</th>
								<th class="d-none d-md-table-cell">Fecha de la factura</th>
								<th>Total</th>
								<th>Detalles</th>
								<th>Estado</th>
							</tr>
						</thead>
					@foreach($pedidos as $pedido)
						<tbody>
							<tr class="facturas_datos">
								<td>{{ $pedido['ref_venta'] }}</td>
								<td class="d-none d-md-table-cell">@dateformat( $pedido['fecha_creado'] )</td>
								<td class="facturas_datos_precio">COP$ {{ number_format($pedido['total'], 0, '', '.') }}</td>
								<td>
									<a target="_blanc" href="{{ route('detalle_factura', $pedido['id']) }}">Ver</a> | 
									<a href="{{  route('descargar_factura', $pedido['id']) }}">Descargar</a>
								</td>
								<td class="facturas_datos_estado">
									@if($pedido['estado'] == 0 || $pedido['estado'] == '')
										<p class="estados pedidos_estado_espera"> {{ "En espera" }} </p>	
									@elseif($pedido['estado'] == 4) 
										<p class="estados pedidos_estado_aprovada"> {{ "Aprovado" }} </p>
									@elseif($pedido['estado'] == 6) 
										<p class="estados pedidos_estado_declinada"> {{ "Declinada" }} </p>
									@elseif($pedido['estado'] == 5)
										<p class="estados pedidos_estado_expirada"> {{ "Expirada" }} </p>
									@endif	
								</td>
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