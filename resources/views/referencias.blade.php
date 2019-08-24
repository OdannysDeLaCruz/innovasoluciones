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
	<title>Referencias y descripción del producto | Home </title>
</head>
<body>
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->
	
	<section class="contenido_principal">
		<section class="section_principal">
			<span class="section_principal_titulo"> 
				<a href="javascript:history.back(-1);">
					<span class="fa fa-chevron-left mr-2"></span> {{ $producto['nombre'] }}
				</a>
				<a href="{{ route('showDetallesCompra', [ $producto['ref'], $producto['nombre-url'] ]) }}">
					<button class="section_principal_btncomprar">VER DETALLES <span class="fa fa-chevron-right ml-2"></span></button>				
				</a>				
			</span>
		</section>
		<section class="section_referencias">
			@foreach ($imagenes as $imagen)
				<img class="section_referencias_img" src='{{ asset("uploads/productos/imagenes/$imagen->imagen_url") }}'>
	        @endforeach
	        <div class="section_referencias_contenedor_videos">
		        @foreach ($videos as $video)
					{!! $video->video_url !!}
		        @endforeach	        	
	        </div>
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