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
	
	<!-- SECCION CARRITO -->
	@include('includes/carrito')
	<!-- FIN CARRITO -->

	<!-- SECCION CATEGORIAS -->
	@include('includes/menu_categorias')	
	<!-- FIN CATEGORIAS -->
	
	<div class="detalle_fondo_img">
		<img src="{{ asset('img/detalle_fondo.jpg') }}">
	</div>
	<section class="detalle row">
		<h1 class="col-12 detalle_titulo">Detalles del producto</h1>
		
		@foreach($producto as $detalle)
			
			<div class="detalle_descripcion_img col-md-7">
				<div id="detalle_visualizador"></div>
				<div class="detalle_descripcion_img_lista_img">	
					<!-- Va de primero la imagen que viene desde la tabla producto -->
					<img class="lista_img" src="{{ asset($detalle['imagen']) }}" alt="imganes de descripcion">
					<!-- Luego las imagenes que vienen de la tabla imagenes_productos -->
			        @foreach ($imagenes as $imagen)
						<img class="lista_img" src="{{ asset($imagen['nombre_imagen']) }}" alt="imganes de descripcion">
			        @endforeach
				</div>
			</div>
			<section class="detalle_info col-md-5 pt-4 pt-md-0">
				<h1 class="detalle_info_titulo ">{{ $detalle['descripcion'] }}</h1>
				<h1 class="detalle_info_opinion">{{ 'Buen producto' }}</h1>
				<span class="detalle_info_precio_anterior"><p>$ {{ $detalle['precio'] }}</p>  Precio normal</span>
				<span class="detalle_info_precio"> <p>$ {{ $detalle['precio'] }}</p> {{ $detalle['descuento'] }}% DESCUENTO</span>
				<span class="detalle_info_tiempo_envio">Tiempo de envio estimado: <p>20 - 27 días despues de realizar pago.</p></span>
				<span class="detalle_info_envio_gratis"> 
					<!-- Verificar si el envio es gratis o no -->
					@if(true)
						{{ 'Envío gratis' }} <i class="fa fa-check-circle"></i> 
					@endif
				</span>
				
				<!-- OPCIONAL SI ES ALGUN ARTICULO QUE REQUIERA DE TALLAS, COMO ZAPATOS, CAMISAS ETC -->
				@if( $detalle['id_categoria'] == 6 )
					<select id="tallas" name="tallas" class="detalle_info_tallas">
						<option>Escoje una talla</option>
						<option value="28">28</option>
						<option value="30">30</option>
						<option value="32">32</option>
					</select>
				@endif
				
				<div class="detalle_info_btn_comprar botones_innova">
					<a href="">Agregar al carro</a>
				</div>
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