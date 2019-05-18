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
			<section class="col-xs-12 col-sm-9 pl-sm-2 compras_users">
				<h1 class="titulo_seccion mt-2 mb-4">
					<a class="btn btn-outline-dark btn-sm mr-2" style="text-decoration: none;" href="javascript:history.back(-1);" title="Ir la página anterior">
						<span class="fa fa-arrow-left mr-2"> </span>
						Detalles del pedido {{ $pedido_id }}
					</a>

					<span id="btn-toggle-detalles" class="compras_users_btn_toggle">
						<p class="compras_users_btn_toggle_texto" id="texto-toggle">Ocultar detalles</p>
						<span class="fa fa-chevron-down compras_users_btn_toggle_icon" id="icono-toggle"></span>
					</span>
				</h1>				
				@if(isset($info_pedido) && isset($detalle_pedido))
					@foreach($info_pedido as $pedido)
						<section class="row info_pedido" id="info_pedido">
							<div class="col-12 col-lg-6 info_pedido_seccion">
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Dirección envío</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->pedido_dir }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Referencia de venta</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->pedido_ref_venta }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Valor del pedido</span>
									<span class="info_pedido_seccion_block_items texto">$ {{ number_format($total_pagar, 0, '', '.') . " " . $pedido->tipo_moneda_transaccion }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Promoción</span>
									<span class="info_pedido_seccion_block_items texto">
										@if($pedido->promo_nombre) 
											{{ $pedido->promo_nombre }}
										@else
											{{ "Ningúno" }}
										@endif
									</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Tipo de envío</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->envio_metodo }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Estado del pedido</span>
									<span class="info_pedido_seccion_block_items texto">
										@if($pedido->estado == 0)
											<p class="estados pedidos_estado_espera"> {{ "En espera" }} </p>	
										@elseif($pedido->estado == 4) 
											<p class="estados pedidos_estado_rechazado"> {{ "Rechazado" }} </p>
										@elseif($pedido->estado == 6) 
											<p class="estados pedidos_estado_rechazado"> {{ "Rechazado" }} </p>
										@elseif($pedido->estado == 5)
											<p class="estados pedidos_estado_declinado"> {{ "Declinado" }} </p>
										@endif										
									</span>
								</div>
							</div>
							<div class="col-12 col-lg-6 info_pedido_seccion">
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Metodo de pago</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->metodo_pago_nombre }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Número de cuotas</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->numero_cuotas_pago }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Referencia venta de Payu</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->referencia_venta_payu  }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Transacciones PSE</span>
									<span class="info_pedido_seccion_block_items texto">
										{{ "Banco: " . $pedido->pse_bank }} <br>
										{{ "Cus : " . $pedido->pse_cus }} <br>
										{{ "Codigos: " . $pedido->pse_references }}
									</span>
								</div>

								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Dispositivo donde se realizó la compra</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->pedido_tipo_dispositivo }}</span>
								</div>
								<div class="info_pedido_seccion_block">
									<span class="info_pedido_seccion_block_items titulo">Fecha de transacción</span>
									<span class="info_pedido_seccion_block_items texto">
										@dateformat( $pedido->fecha_transaccion)
									</span>
								</div>
							</div>
						</section>
					@endforeach

					@foreach( $detalle_pedido as $detalle )
						<div class="compras">
							<span class="compras_info">
								<a target="_blank" href="/productos/{{ $detalle['detalle_producto_ref'] }}-{{ $detalle['detalle_descripcion'] }}">
									<img class="compras_info_img" src="{{ $detalle['detalle_imagen'] }}"></img>
								</a>
								<div class="compras_info_datos">
									<a target="_blanc" href="/productos/{{ $detalle['detalle_producto_ref'] }}-{{ $detalle['detalle_descripcion'] }}">
										<span class="compras_info_descripcion">{{ $detalle['detalle_descripcion'] }}</span>
									</a>
									<span class="compras_info_datos_items compras_costo_cantidad">
										$ {{ number_format($detalle['detalle_precio'], 0, '', '.') }} x {{ $detalle['detalle_cantidad'] }} unidad(es)
									</span>
									<span class="compras_info_datos_items compras_promo_info">
										{{ $detalle['detalle_promo_info'] }}
									</span>
									<span class="compras_info_datos_items compras_total">
										<?php 
											$precio = $detalle['precio'] * $detalle['cantidad'];
											$a_descontar = $precio * ($detalle['descuento_porcentual'] / 100);
											$total = $precio - $a_descontar;
										?> 
										Total: $ {{ number_format($detalle['detalle_precio_final'], 0, '', '.') }} 
									</span>	
								</div>
							</span>
						</div>
					@endforeach
				@endif
				<!-- si no existe compra, es por que la idPedido no existe para este usuario, verificamos si existe la variable Error -->
				@isset($Error)
					<div class="compras_pedido">
						<span class="compras_pedido_error">{{ $Error }}</span>
					</div>
				@endisset
			</section> 
		@stop
	<!-- FIN PERFIL -->
</body>
</html>