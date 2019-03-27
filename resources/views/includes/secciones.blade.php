<section class="seccion_categorias">
	<label class="seccion_categorias_textos">
		<h1 class="seccion_categorias_titulo">Categorias de productos</h1>
		<a href="/productos" class="seccion_categorias_link">Ver mas</a>
	</label>
	<section class="seccion_categorias_items">
		<!-- COLRES DE FONDO PARA LOS ITEM_IMG -->
		@php
			$c = ['#cd84f1', '#32ff7e', '#18dcff', '#3ae374', '#1B1464', '#3dc1d3', '#f78fb3', '#546de5', '#e15f41', '#f8a5c2', '#ff3838', '#17c0eb'];
		@endphp
		@foreach ($secciones as $seccion)

    		<div class="item">
				<label class="item_img" style="background: linear-gradient(to right, {{  $c[rand(0,11)] }}, {{ $c[rand(0,11)] }});">
					<img src="img/logos/svg/{{ $seccion['seccion_imagen'] }}">
				</label>
				<h1 class="item_titulo">{{ $seccion['seccion_nombre'] }} </h1>
				<a class="item_link" href="/productos/{{ $seccion['seccion_nombre'] }}"></a>
			</div>

		@endforeach

	</section>
</section>