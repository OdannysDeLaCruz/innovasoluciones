<section class="seccion_categorias">
	<label class="seccion_categorias_textos">
		<h1 class="seccion_categorias_titulo">Categorias de productos</h1>
		<a href="/productos.php" class="seccion_categorias_link">Ver mas</a>
	</label>
	<section class="seccion_categorias_items">

		@foreach ($secciones as $seccion)

    		<div class="item">
				<label class="item_img">
					<img src="img/logos/svg/{{ $seccion['imagen'] }}">
				</label>
				<h1 class="item_titulo">{{ $seccion['nombre'] }} </h1>
				<a class="item_link" href="/"></a>
			</div>

		@endforeach

	</section>
</section>