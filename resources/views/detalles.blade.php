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
		<div class="detalle_descripcion_img col-md-6">
			<div id="detalle_visualizador"></div>
			<div class="detalle_descripcion_img_lista_img">				
				<img class="lista_img" src="{{ asset('img/zapatos.jpg') }}" alt="imganes de descripcion">
				<img class="lista_img" src="{{ asset('img/camara.jpg') }}" alt="imganes de descripcion">
				<img class="lista_img" src="{{ asset('img/celular.jpg') }}" alt="imganes de descripcion">
				<img class="lista_img" src="{{ asset('img/reloj.jpg') }}" alt="imganes de descripcion">
			</div>
		</div>
		<section class="detalle_info col-md-6">
			<h1 class="detalle_info_titulo">{{ 'Producto #' . $id }}</h1>
			<p class="detalle_info_descripcion">{{ 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, eaque!' }} </p>
			<span class="detalle_info_precio"> {{ '$ 1.200.000 COP' }}</span>
			
			<!-- OPCIONAL SI ES ALGUN ARTICULO QUE REQUIERA DE TALLAS, COMO ZAPATOS, CAMISAS ETC -->
			<select id="tallas" name="tallas" class="detalle_info_tallas">
				<option>Escoje una talla</option>
				<option value="28">28</option>
				<option value="30">30</option>
				<option value="32">32</option>
			</select>

			<div class="detalle_info_btn_comprar botones_innova">
				<a href="">Comprar</a>
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