<section class="seccion_categorias">
	<label class="seccion_categorias_textos">
		<h1 class="seccion_categorias_titulo">Categorias de productos</h1>
		<a href="/productos" class="seccion_categorias_link">Ver mas</a>
	</label>
	<section class="seccion_categorias_items">

		@foreach ($secciones as $seccion)

    		<div class="item">
				<label class="item_img">
					<img src="img/logos/svg/{{ $seccion['imagen'] }}">
				</label>
				<h1 class="item_titulo">{{ $seccion['nombre'] }} </h1>
				<?php 
					$ruta =  str_replace(' ','-', $seccion['nombre']);
					$ruta = strtolower($ruta); 
				?>
				<a class="item_link" href="/productos/{{ $ruta }}"></a>
			</div>

		@endforeach

	</section>
</section>