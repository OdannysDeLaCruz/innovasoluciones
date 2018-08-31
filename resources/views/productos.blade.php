
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
					<section class="producto">
						<figure>
							<a href="/productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">
								<img src="{{ $producto['imagen'] }}" class="producto_img" alt="{{ $producto['descripcion'] }}">							
							</a>
						</figure>
						<div class="producto_info">
							<a href="/productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">
								<h1 class="producto_titulo"> {{ $producto['descripcion'] }}</h1>
							</a>
							@if($producto['descuento'] != 0)
								<span class="producto_precio_anterior">
									<p class="precio_anterior"> ${{ number_format($producto['precio'], 2) }} </p>
									<p class="descuento">
									-{{ $producto['descuento'] }}%
									</p>
								</span>
							@endif
							<label class="producto_precio">
								@php 
									$descuento = $producto['precio'] * ($producto['descuento'] / 100);
									$total = $producto['precio'] - $descuento;
								@endphp
								<p>${{ number_format($total, 2) }} <small>COP</small></p>			
							</label>
						</div>
						<!-- <label class="producto_botones"> -->
							<!-- <div class="botones_innova btn_producto">
								<a href="/productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">Detalles</a>
							</div> -->
							<!-- <div class="botones_innova btn_producto">
								<a href="">Comprar</a>
							</div> -->
						<!-- </label> -->
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
