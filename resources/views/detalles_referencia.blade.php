<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" >

	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Detalles por referencias - opción de compra | Innova Soluciones </title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<div class="detalle_fondo_img">
		<img src="{{ asset('img/detalle_fondo.jpg') }}">
	</div>
	
	<div class="detalle contenedor-breadcrumb row m-auto ml-0 mr-0">
		<nav aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
		    <li class="breadcrumb-item"><a href="{{ route('productos') }}">Productos</a></li>
		    <li class="breadcrumb-item active" aria-current="page">Detalles</li>
		  </ol>
		</nav>
	</div>
	<section class="detalle detalle_referencia row m-auto ml-0 mr-0 flex-column-reverse flex-md-row">
		@foreach($producto as $detalle)
			<section class="detalle_info col-12 col-md-4 pt-4 pt-md-4">
				<h1 class="detalle_info_titulo ">{{ $detalle->producto_nombre }}</h1>
				<span class="detalle_info_tags">
					@foreach($tags as $tag)
						<a href="{{ route('productoTag', $tag) }}">
							<h3 class="tag">{{ $tag }}</h3>	
						</a>											
					@endforeach
				</span>

				<!-- SECCION DE DESCUENTO O PROMOCION DEL PRODUCTO -->
				@if($detalle['promo_tipo'])
					<span class="detalle_info_precio_anterior">
						@if($detalle['promo_tipo'] == '%')
							<p class="antes"> Antes COP$ {{ number_format($detalle['producto_precio'], 0, ',', '.') }}</p>
							<span class="promo">
								{{ $detalle['promo_costo'] }}% DCTO
							</span>
						@elseif($detalle['promo_tipo'] == '$')
							<p class="antes"> Antes COP$ {{ number_format($detalle['producto_precio'], 0, ',', '.') }}</p>
							<span class="promo">
								COP$ {{ number_format($detalle['promo_costo'], 0, ',', '.') }} <small>DCTO</small>
							</span>
						@elseif($detalle['promo_tipo'] == '2x1')
							<span class="promo">{{$detalle['promo_tipo']}}</span>
						@endif					
					</span>
				@endif

				<!-- SECCION TOTAL DEL PRODUCTO -->
				<span class="detalle_info_precio detalle_info_item"> 
					<?php 
						if ($detalle['promo_tipo'] == '%') {
							$descuento = $detalle['producto_precio'] * ($detalle['promo_costo'] / 100);
							$total     = $detalle['producto_precio'] - $descuento;
							$total     = '<span class="ahora">Ahora</span>' . '<span class="total">COP$ ' .  number_format($total, 0, '', '.') . '</span>'; 
						}
						elseif($detalle['promo_tipo'] == '$'){
							$total = $detalle['producto_precio'] - $detalle['promo_costo'];
							$total = '<span class="ahora">Ahora</span>' . '<span class="total">COP$ ' .  number_format($total, 0, '', '.') . '</span>';
						}
						else {
							$total = '<span class="total">COP$ ' .   number_format($detalle['producto_precio'], 0, ',', '.') . '</span>';
						}
					 ?>
					{!! $total !!}
				</span>
				<span class="detalle_info_costo_envio detalle_info_item">
					<i class="fa fa-truck detalle_info_icon" title="Envio gratis"></i>Envío gratis a todo Colombia
				</span>
				<span class="detalle_info_costo_envio detalle_info_item">
					<i class="fa fa-hourglass-half detalle_info_icon" title="Tiempo de entrega"></i>Tiempo de entrega: 20 días
				</span>				

				<!-- OPCIONAL SI ES ALGUN ARTICULO QUE REQUIERA DE TALLAS, COMO ZAPATOS, CAMISAS ETC -->
				<form class="detalle_info_form" id="datos-agregar-producto" action="{{ route('addItem') }}" method="post">
					{{ csrf_field() }}
					<input type="hidden" class="inputs" id="id" name="id" value="{{ $detalle['id'] }}">
					<input type="hidden" class="inputs" id="producto_ref" name="producto_ref" value="{{ $detalle['producto_ref'] }}">
					@empty(!$detalle['producto_colores'])
						<label for="colores">Colores</label>
						<select id="colores" name="colores" class="detalle_info_color" required>
							@php $colores = explode( ',', $detalle['producto_colores'] ); @endphp
							@foreach($colores as $color)
								<option value="{{$color}}">{{$color}}</option>					
							@endforeach
						</select>
					@endempty
					@empty(!$detalle['producto_tallas'])
						<label for="tallas">Tallas</label>
						<select id="tallas" name="tallas" class="detalle_info_talla" required>
							@php $tallas = explode( ',', $detalle['producto_tallas'] ); @endphp
							@foreach($tallas as $talla)
								<option value="{{$talla}}">{{$talla}}</option>					
							@endforeach
						</select>
					@endempty
					<button type="submit" id="btn-agregar-producto" class="btn btn-primary detalle_info_btn_comprar">AÑADIR AL CARRITO</button>
				</form>
			</section>
			<div class="detalle_descripcion_container col-12 col-md-8 h-25">
				<!-- Va de primero la imagen que viene desde la tabla producto -->
				<div class="detalle_descripcion_container_img">
					<img class="img_principal" src='{{ asset("uploads/productos/imagenes/miniaturas/$detalle->producto_imagen") }}' alt="{{ $detalle->producto_nombre }}">
					
				</div>
				<!-- <img class="img_principal" src='{{ asset("uploads/productos/imagenes/miniaturas/1563425529_asus1.png") }}' alt="imganes de descripcion"> -->
			</div> 
		@endforeach
	</section>
	<section class="detalle detalle_referencia row m-auto ml-0 mr-0">
		<section class="col-12 col-md-4 pt-4 pt-md-4">
			<!-- <section class="detalle_info_descripcion">
				<article>
					<h2>Información de envío</h2>
				</article>
			</section> -->
		</section>
		<section class="col-12 col-md-8 p-3">
			<section class="detalle_info_descripcion p4">
				<article>
					<h2>Información del producto</h2>
					<p>{!! $detalle->producto_descripcion !!}</p>
				</article>
			</section>
		</section>
			
	</section>

	<!-- SECCION FOOTER -->
	@include('includes/footer')
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>