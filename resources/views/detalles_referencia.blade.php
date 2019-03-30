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

	<!-- SECCION CATEGORIAS -->
	@include('includes/menu_categorias')	
	<!-- FIN CATEGORIAS -->
	
	<div class="contenedor_detalle_referencia">
		<section class="detalle_referencia row">
			<section class="detalle_referencia_info col-12 col-md-6">
				@foreach($producto as $detalle)
					<h1 class="detalle_info_titulo ">{{ $detalle['producto_descripcion'] }}</h1>
					<span class="detalle_info_tags">
						@foreach($tags as $tag)
							<a href="{{ route('productoTag', $tag) }}">
								<h3 class="tag">{{ $tag }}</h3>	
							</a>											
						@endforeach
					</span>
					<span class="detalle_info_precio_anterior">
						
						@if($detalle['promo_tipo'] == 'descuento%')
							<p class="antes"> Antes ${{ number_format($detalle['producto_precio'], 0, ',', '.') }}</p>
							<span class="promo">
								-{{ $detalle['promo_costo'] }}% DESCUENTO
							</span>
						@elseif($detalle['promo_tipo'] == 'peso')
							<span class="promo">
								Cupón de ${{ number_format($detalle['promo_costo'], 0, ',', '.') }} <small>COP</small>
							</span>
						@else
							<span class="promo">{{$detalle['promo_tipo']}}</span>
						@endif
						
					</span>
					<span class="detalle_info_precio detalle_info_item"> 
						<?php 
						if ($detalle['promo_tipo'] == 'descuento%') {
							$descuento = $detalle['producto_precio'] * ($detalle['promo_costo'] / 100);
							$total = $detalle['producto_precio'] - $descuento;
							$total = "Ahora $" . number_format($total, 0, ',', '.');
						}
						elseif($detalle['promo_tipo'] == 'peso'){
							$total = $detalle['producto_precio'] - $detalle['promo_costo'];
							$total = "$" . number_format($total, 0, ',', '.');
						}
						else {
							$total = "$" . number_format($detalle['producto_precio'], 0, ',', '.');
						}
					 ?>
					<i class="fa fa-money icon_envio" title="Envio gratis"></i>{{ $total }}
					</span>
					<span class="detalle_info_costo_envio detalle_info_item">
						<i class="fa fa-truck icon_envio" title="Envio gratis"></i>Envío gratis a todo Colombia
					</span>
					<span class="detalle_info_tiempo_envio detalle_info_item">
						<i class="fa fa-hourglass-half icon_envio" title="Tiempo de entrega"></i>Tiempo de entrega: 20 días
					</span>

					<!-- OPCIONAL SI ES ALGUN ARTICULO QUE REQUIERA DE TALLAS, COMO ZAPATOS, CAMISAS ETC -->
					<form class="detalle_info_form" id="datos-agregar-producto" action="{{ route('addItem') }}" method="post">

						{{ csrf_field() }}
						<input type="hidden" class="inputs" id="id" name="id" value="{{ $detalle['id'] }}">
						<input type="hidden" class="inputs" id="descripcion" name="descripcion" value="{{ $detalle['descripcion'] }}">
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
						<button type="submit" id="btn-agregar-producto" class="btn btn-primary detalle_info_btn_comprar">Realizar compra</button>
					</form>
				@endforeach
			</section>
			<section class="detalle_referencia_mensajes col-12 col-md-6">
				<!-- <img src="{{ asset($detalle['producto_imagen']) }}"> -->
				<img src="{{ asset('img/zapatos.jpg') }}">
			</section>
		</section>
	</div>

	<!-- SECCION FOOTER -->
	@include('includes/footer')
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>