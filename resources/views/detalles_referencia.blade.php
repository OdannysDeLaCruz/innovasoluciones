<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Detalles del producto | Innova Soluciones </title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION CATEGORIAS -->
	@include('includes/menu_categorias')	
	<!-- FIN CATEGORIAS -->
	
	<div class="detalle_fondo_img">
		<img src="{{ asset('img/detalle_fondo.jpg') }}">
	</div>
	<section class="detalle row">
		@foreach($producto as $detalle)
			<div class="detalle_descripcion_img col-md-7">
			
			</div>
			<section class="detalle_info col-md-5 pt-4 pt-md-0">
				<h1 class="detalle_info_titulo ">{{ $detalle['descripcion'] }}</h1>
				<!-- <h1 class="detalle_info_opinion">{{ 'Buen producto' }}</h1> -->
				<span class="detalle_info_tags">
					@foreach($tags as $tag)
						<a href="{{ route('productoTag', $tag) }}">
							<h3 class="tag">{{ $tag }}</h3>	
						</a>											
					@endforeach
				</span>
				<span class="detalle_info_precio_anterior">
					@if($detalle['descuento'] != 0)
						<p> Antes ${{ number_format($detalle['precio'], 2) }}</p> 
						<p class="descuento">
						-{{ $detalle['descuento'] }}% DESCUENTO
						</p>
					@endif
					
				</span>
				<span class="detalle_info_precio"> 
					<?php 
						$descuento = $detalle['precio'] * ($detalle['descuento'] / 100);
						$total = $detalle['precio'] - $descuento;
					 ?>
					Ahora <p>${{ number_format($total, 2) }}</p>
				</span>
				<span class="detalle_info_costo_envio">
					<i class="fa fa-truck icon_envio"></i>Envío gratis a todo Colombia
				</span>
				<span class="detalle_info_costo_envio">
					<i class="fa fa-hourglass-half icon_envio"></i>Tiempo de entrega: {{ $detalle['tiempo_entrega'] }}
				</span>
				<!-- OPCIONAL SI ES ALGUN ARTICULO QUE REQUIERA DE TALLAS, COMO ZAPATOS, CAMISAS ETC -->
				<form id="datos-agregar-producto" action="{{ route('addItem') }}" method="post">

					{{ csrf_field() }}
					<input type="hidden" class="inputs" id="id" name="id" value="{{ $detalle['id'] }}">
					<input type="hidden" class="inputs" id="descripcion" name="descripcion" value="{{ $detalle['descripcion'] }}">
					@empty(!$detalle['colores'])
						<label for="colores">Colores</label>
						<select id="colores" name="colores" class="detalle_info_color" required>
							@php $colores = explode( ',', $detalle['colores'] ); @endphp
							@foreach($colores as $color)
								<option value="{{$color}}">{{$color}}</option>					
							@endforeach
						</select>
					@endempty
					@empty(!$detalle['tallas'])
						<label for="tallas">Tallas</label>
						<select id="tallas" name="tallas" class="detalle_info_talla" required>
							@php $tallas = explode( ',', $detalle['tallas'] ); @endphp
							@foreach($tallas as $talla)
								<option value="{{$talla}}">{{$talla}}</option>					
							@endforeach
						</select>
					@endempty
					<button type="submit" id="btn-agregar-producto" class="btn btn-primary detalle_info_btn_comprar">Comprar</button>
				</form>
			</section>
		@endforeach
	</section>

	<!-- SECCION FOOTER -->
	@include('includes/footer')
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>