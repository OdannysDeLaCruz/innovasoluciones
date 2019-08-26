<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title>Innova Soluciones | Cart </title>
</head>
<body style="padding-top: 50px;">
	<!-- SECCION HEADER -->
	<div class="carrito_regresar">
		<a href="javascript:history.back(-1);">
			<span class="fa fa-chevron-left mr-2"></span> Carrito de compras			
		</a>
	</div>
	<!-- FIN HEADER -->	
	<!-- SECCION CARRITO -->
	<section class="contenedor_carrito">
		@if(count($cart))
			@foreach($cart as $carrito)
				<section class="pedido carrito">
					<div class="pedido-img carrito-img">
						<a target="_blank" href="{{ route('descripcion', [ 'ref' => $carrito['producto_ref'], 'descripcion' => $carrito['nombre'] ]) }}">
							@php $url = "uploads/productos/imagenes/miniaturas/" . $carrito['imagen']; @endphp
							<img src="{{ $url }}">
						</a>
					</div>
					<div class="pedido-info">
						<ul class="pedido-info-list d-flex flex-column">
							<li class="pedido-info-list-item nombre-producto">
								<a target="_blank" href="{{ route('descripcion', [ 'ref' => $carrito['producto_ref'], 'descripcion' => $carrito['nombre'] ]) }}">
									{{ $carrito['nombre'] }}
								</a>
							</li>
							<?php 
								$color = $carrito['color'] != '' ? $carrito['color'] : '';
								$talla = $carrito['talla'] != '' ? $carrito['talla'] : '';
							?>
							<li class="pedido-info-list-item talla-producto">
								<b>Talla: {{ $talla }} | Color: {{ $color }} </b>
							</li>
							@if($carrito['promocion'] != '')
								<li class="pedido-info-list-item promocion-producto">
									<span class="promocion-producto-precio-anterior">
										COP$ {{ number_format($carrito['precio'], 0, '', '.') }}
									</span>

									@if($carrito['promo_tipo'] == '%')
										<span class="promocion-producto-tag">
											{{ $carrito['promocion'] }} DCTO
										</span>
									@elseif($carrito['promo_tipo'] == '$')
										<span class="promocion-producto-tag">
											COP$ {{ number_format($carrito['promocion'], 0, '', '.') }} DCTO
										</span>
									@else
										<span class="promocion-producto-tag">
											{{ $carrito['promocion'] }}
										</span>
									@endif
								</li>
							@endif
							<li class="pedido-info-list-item nombre-opciones">
								<div class="nombre-opciones-items nombre-opciones-cantidad">
									<input style="width: 30px;" class="ml-2" type="number" min="1" max="10" value="{{ $carrito['cantidad'] }}" id="producto_{{ $carrito['id'] }}">
									<a  data-toggle="tooltip"
						      			data-placement="top"
						      			title="Actualizar cantidad"
						      			href="#"
						      			class="btn_actualizar_carrito"
						      			data-href="{{ route('updateItem', $carrito['id']) }}"
						      			data-id="{{ $carrito['id'] }}"
						      		>
							      		<div class="fa fa-refresh"></div>
							      	</a>
								</div>
							</li>									
					      	<li class="pedido-info-list-item nombre-precio">
								COP$ {{ number_format($carrito['total'], 0, '', '.') }}
							</li>
							<div class="nombre-opciones-items nombre-opciones-eliminar">
								<a href="{{ route('deleteItem', $carrito['id']) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
			      					<span class="fa fa-trash-o"></span>
			      				</a>
							</div>
						</ul>
					</div>
				</section>
			@endforeach

			<div class="suma_total_carrito">
				<small>Total a pagar:</small>
				COP$ {{ number_format( session('total_del_pedido'), 0, '', '.') }} <br>
				@if(session('codigos_usados'))
					<small style="font-size: 13px;">Usted utilizó el código {{ session('codigos_usados') }}</small>
					
				@endif
			</div>
			
			<span class="carrito_botones">		
				<a href="{{ route('productos') }}" class="btn-innova btn-principal">
					<span class="fa fa-chevron-left mr-2"></span> Comprar más
				</a>
				<a href="{{ route('verificar') }}" class="btn-innova btn-principal">
					<span class="fa fa-credit-card-alt mr-2"></span> Tramitar
				</a>
			</span>
			
			<!-- BARRA FIJA DE TRAMITAR -->
			<span class="carrito_barra_moviles">	
				<div class="carrito_barra_moviles_resumen">
					Total: <span class="carrito_barra_moviles_resumen_total">COP$ {{ number_format( session('total_del_pedido'), 0, '', '.') }}</span>
				</div>				
				<div class="carrito_barra_moviles_botones">					
					<a href="{{ route('productos') }}" class="btn-innova btn-principal">
						<span class="fa fa-chevron-left mr-2"></span> Comprar más
					</a>
					<a href="{{ route('verificar') }}" class="btn-innova btn-principal">
						<span class="fa fa-credit-card-alt mr-2"></span> Tramitar
					</a>
				</div>				
			</span>
		@else 
			<!-- Elimino el las variables de session codigos_usados, descuento_peso y notificacion_codigo si no hay algo en el carrito-->
			@php
				session()->forget('codigos_usados');				
				session()->forget('descuento_peso');				
				session()->forget('notificacion_codigo');		
			@endphp

			<div class="msm_carrito_vacio">
				<img class="msm_carrito_vacio_img" src="{{ asset('img/logos/shopping-bag.png') }}">
				<p class="msm_carrito_vacio_texto">Su carrito esta vacío</p>
			</div>
			<label class="carrito_botones ">		
				<a href="{{ route('productos') }}" class="btn-innova btn-principal">
					<span class="fa fa-arrow-left mr-2"> </span> Ir de compras
				</a>
			</label>
		@endif
	</section>
	<!-- FIN SECCION CARRITO -->
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>