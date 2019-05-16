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
		<div class="seccion_productos_content">
			@if(isset($productos))
				@foreach($productos as $producto)
					<?php 
						$ref  = $producto['producto_ref'];
						$desc = str_replace(" ", "-", $producto['producto_descripcion']);
					?>
					<section class="producto">
						<figure>
							<a href="/productos/{{ $ref }}-{{ $desc }}">
								<!-- <img src="{{ $producto['producto_imagen'] }}" class="producto_img" alt="{{ $producto['producto_descripcion'] }}"> -->
								<img src="{{asset('img/zapatos.jpg')}}" class="producto_img">							
							</a>
						</figure>
						<div class="producto_info">
							<a href="/productos/{{ $ref }}-{{ $desc }}">
								<h1 class="producto_titulo"> {{ $producto['producto_descripcion'] }}</h1>
							</a>

							@if($producto['promo_tipo'] == 'descuento%')
								<span class="producto_precio_anterior">
									<p class="descuento">
										-{{ $producto['promo_costo'] }}%
									</p>
									<p class="precio_anterior"> ${{ number_format($producto['producto_precio'], 0, ',', '.') }} </p>
								</span>

							@elseif($producto['promo_tipo'] == 'peso')
								<span class="producto_precio_anterior">
									<p class="descuento">
										-${{ number_format($producto['promo_costo'], 0, ',', '.') }}							
									</p>
									<p class="precio_anterior"> ${{ number_format($producto['producto_precio'], 0, ',', '.') }} </p>
								</span>
							@elseif($producto['promo_tipo'] == '2x1')
								<span class="producto_precio_anterior">
									<p class="descuento">
										{{ $producto['promo_tipo'] }}					
									</p>
								</span>
							@endif
						</div>

						<label class="producto_precio">

								@php
								if($producto['promo_tipo'] == 'descuento%') {
									$descuento = $producto['producto_precio'] * ($producto['promo_costo'] / 100);
									$total = $producto['producto_precio'] - $descuento;
								}
								elseif($producto['promo_tipo'] == 'peso'){
									$total = $producto['producto_precio'] - $producto['promo_costo'];
								}
								else {
									$total = $producto['producto_precio'];
								}
								@endphp
								<p>${{ number_format($total, 0, ',', '.') }} </p>		
						</label>
						
					</section>	
				@endforeach
		</div>
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
