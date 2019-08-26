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
			@if(!isset($Error))
				<section class="col-xs-12 col-md-10 compras_users">
					<h1 class="titulo_seccion mt-2 mb-4">
						<a class="btn btn-outline-dark btn-sm mr-2" style="text-decoration: none;" href="javascript:history.back(-1);" title="Ir la página anterior">
							<span class="fa fa-arrow-left mr-2"> </span>
								Pedido {{ $pedido_ref }}
						</a>

						<span id="btn-toggle-detalles" class="compras_users_btn_toggle">
							<p class="compras_users_btn_toggle_texto" id="texto-toggle">Ocultar detalles</p>
							<span class="fa fa-chevron-down compras_users_btn_toggle_icon" id="icono-toggle"></span>
						</span>
					</h1>
					<span class="costo_pedido">
						Costo del pedido: $ {{ $costo_pedido }}					
					</span>
					@if(isset($info_pedido) && isset($detalle_pedido))
						@foreach($info_pedido as $pedido)
							<section class="row info_pedido row" id="info_pedido">
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Dirección envío</span>
									<span class="info_pedido_seccion_block_items texto">
										{{ $direccion[0]->calle . ' #' . $direccion[0]->numero . ' ' . $direccion[0]->barrio }} <br>
										{{ $direccion[0]->ciudad . ' - ' . $direccion[0]->departamento . ' - ' . $direccion[0]->pais }}
									</span>
								</div>
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Referencia de venta</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->pedido_ref_venta }}</span>
								</div>
								<!-- COSTO DE TRANSACCION PAGADO -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Valor de transacción pagado</span>
									<span class="info_pedido_seccion_block_items texto">
										@if($pedido->valor_transaccion != 0)
											 {{ "$ " . number_format($pedido->valor_transaccion, 0, '', '.') . ' ' . $pedido->tipo_moneda_transaccion }}										
										@else
											{{ "$ 0" }}
										@endif
									</span>
								</div>
								<!-- PROMOCION -->
								@if($pedido->promo_nombre) 
									<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
										<span class="info_pedido_seccion_block_items titulo">Promoción</span>
										<span class="info_pedido_seccion_block_items texto">
												{{ 'Nombre: ' . $pedido->promo_nombre}} <br>
												{{ 'Costo: ' . $pedido->promo_tipo . ' ' . number_format($pedido->promo_costo, 0, '', '.') }} <br>
										</span>
									</div>
								@endif
								<!-- TIPO DE ENVIO -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Tipo de envío</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->envio_metodo }}</span>
								</div>
								<!-- ESTADO DEL PEDIDO -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Estado del pedido</span>
									<span class="info_pedido_seccion_block_items texto">
										@if($pedido->estado == 0 || $pedido->estado == '')
											<p class="estados pedidos_estado_espera"> {{ "En espera" }} </p>	
										@elseif($pedido->estado == 4) 
											<p class="estados pedidos_estado_aprovada"> {{ "Aprovado" }} </p>
										@elseif($pedido->estado == 6) 
											<p class="estados pedidos_estado_declinada"> {{ "Declinada" }} </p>
										@elseif($pedido->estado == 5)
											<p class="estados pedidos_estado_expirada"> {{ "Expirada" }} </p>
										@endif										
									</span>
								</div>
								<!-- DESCRIPCION DE TRANSACCION -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Descripcion de transacción</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->descripcion_transaccion }}</span>
								</div>
								<!-- METODO DE PAGO -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Metodo de pago</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->metodo_pago_nombre }}</span>
								</div>
								<!-- NUMERO DE CUOTAS -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Número de cuotas</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->numero_cuotas_pago }}</span>
								</div>
								<!-- REFERENCIA DE VENTA DE PAYU -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Referencia venta de Payu</span>
									<span class="info_pedido_seccion_block_items texto">{{ $pedido->referencia_venta_payu  }}</span>
								</div>
								<!-- TRANSACCIONES CON PSE -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Transacciones con PSE</span>
									<span class="info_pedido_seccion_block_items texto">
										@if($pedido->pse_bank)
											{{ "Banco: " . $pedido->pse_bank }} <br>
										@endif
										@if($pedido->pse_cus)
											{{ "Cus : " . $pedido->pse_cus }} <br>
										@endif
										@if($pedido->pse_references)
											{{ "Codigos: " . $pedido->pse_references }}
										@endif
									</span>
								</div>
								<!-- FECHA DE TRANSACCION -->
								<div class="info_pedido_seccion_block col-6 col-md-4 col-lg-">
									<span class="info_pedido_seccion_block_items titulo">Fecha de transacción</span>
									<span class="info_pedido_seccion_block_items texto">
										@dateformat( $pedido->fecha_transaccion)
									</span>
								</div>
							</section>
						@endforeach

						@foreach( $detalle_pedido as $detalle )
							<div class="compras">
								<span class="compras_info">
									<a target="_blank" href="/productos/{{ $detalle['detalle_producto_ref'] }}-{{ $detalle['detalle_nombre'] }}">
										<img class="compras_info_img" src='{{ asset("uploads/productos/imagenes/miniaturas/$detalle->detalle_imagen") }}'></img>
									</a>
									<div class="compras_info_datos">
										<a target="_blanc" href="/productos/{{ $detalle['detalle_producto_ref'] }}-{{ $detalle['detalle_nombre'] }}">
											<span class="compras_info_descripcion">{{ $detalle['detalle_nombre'] }}</span>
										</a>
										<span class="compras_info_datos_items compras_costo_cantidad">
											$ {{ number_format($detalle['detalle_precio'], 0, '', '.') }} x {{ $detalle['detalle_cantidad'] }} unidad(es)
										</span>
										@if($detalle['detalle_promo_info'] != '')
											<span class="compras_info_datos_items compras_promo_info">
												{{ $detalle['detalle_promo_info'] }}
											</span>
										@endif
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
				</section>
			@else 
				<!-- si no existe compra, es por que la idPedido no existe para este usuario, verificamos si existe la variable Error -->
				<div class="compras_pedido">
					<span class="compras_pedido_error">{{ $Error }}</span>
				</div>			
			@endif
		@stop
	<!-- FIN PERFIL -->
</body>
</html>