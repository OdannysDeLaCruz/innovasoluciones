<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
	<!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" > -->

	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Productos | Innova Soluciones</title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION CATEGORIAS -->
	@include('includes/menu_categorias')	
	<!-- FIN CATEGORIAS -->
	
	<!-- SECCION PRODUCTOS -->
	<section class="seccion_productos">
		<span class="seccion_productos_logo">
			<div class="contenedor_logo">
				<img class="logo" src="{{asset('img/logos/LogoInnovate.svg')}}">
			</div>
		</span>
		<span>
			@isset($search) 
				@isset($productos)
					<h1 style="font-size: 18px; text-align: center;">
						{{ count($productos) }} resultados para <b>{{ $search }}</b>
					</h1>
				@endisset
			@endisset
			
		</span>
		@if(isset($productos))
			<div class="seccion_productos_content">
				@foreach($productos as $producto)
					<?php 
						$ref  = $producto['producto_ref'];
						$nombre = str_replace(" ", "_", $producto['producto_nombre']);
					?>
					<section class="producto">
						<figure>
							<a href="/productos/{{ $ref }}-{{ $nombre }}">
								<img src='{{ asset("storage/productos/imagenes/miniaturas/$producto->producto_imagen") }}' class="producto_img" alt="{{ $producto->producto_nombre }}">							
							</a>
						</figure>
						<div class="producto_info">
							<a href="/productos/{{ $ref }}-{{ $nombre }}">
								<h1 class="producto_titulo">{{ $producto->producto_nombre }}</h1>
							</a>

							@if($producto['promo_tipo'] == '%')
								<span class="producto_precio_anterior">
									<p class="descuento">
										-{{ $producto->promo_costo }}%
									</p>
									<p class="precio_anterior"> 
										${{ number_format($producto->producto_precio, 0, '', '.') }}
									</p>
								</span>

							@elseif($producto->promo_tipo == '$')
								<span class="producto_precio_anterior">
									<p class="descuento">
										-${{ number_format($producto['promo_costo'], 0, '', '.') }}		
									</p>
									<p class="precio_anterior"> 
										${{ number_format($producto['producto_precio'], 0, '', '.') }}
									</p>
								</span>
							@elseif($producto['promo_tipo'] == '2x1')
								<span class="producto_precio_anterior">
									<p class="descuento">
										{{ $producto['promo_tipo'] }}					
									</p>
								</span>
							@endif
							<label class="producto_precio">

									@php
									if($producto['promo_tipo'] == '%') {
										$descuento = $producto['producto_precio'] * ($producto['promo_costo'] / 100);
										$total = $producto['producto_precio'] - $descuento;
									}
									elseif($producto['promo_tipo'] == '$'){
										$total = $producto['producto_precio'] - $producto['promo_costo'];
									}
									else {
										$total = $producto['producto_precio'];
									}
									@endphp
									<p>${{ number_format($total, 0, ',', '.') }} </p>		
							</label>
						</div>						
					</section>	
				@endforeach
			</div>
			<section class="text-center paginacion_links">
				<p class="mt-5 text-center text-muted">Página {{ $productos->currentPage() }} de {{$productos->total()}} resultados</p>
				{{ $productos->links() }}
			</section>
		@else 
			<div class="respuesta">
				<img src="{{asset('img/logos/svg/box.svg')}}">
				<p>
					@isset($response)
						{{ $response }} 
							@isset($search) <b>  {{ $search }} </b> @endisset<br>
							Ver otras categorias de <a href="/productos">productos</a>
					@endisset
				</p>
			</div>
			
		@endif
	</section>
	<!-- FIN SECCION PRODUCTOS -->
	
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>
