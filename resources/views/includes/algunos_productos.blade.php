<section class="seccion_algunos_productos">
	<h1 class="seccion_algunos_productos_titulo">Estos son algunos de nuestros productos</h1>
	<div class="seccion_algunos_productos_content">

		@foreach($algunos_productos as $algunos)
			<?php 
				$ref  = $algunos['producto_ref'];
				$nombre = str_replace(" ", "_", $algunos['producto_nombre']);
			?>
			<section class="producto">
				<figure>
					<a href="/productos/{{ $ref }}-{{ $nombre }}">
						<img src='{{ asset("storage/productos/imagenes/miniaturas/$algunos->producto_imagen") }}' class="producto_img">
					</a>
				</figure>
			</section>
		@endforeach

	</div>
	<div class="btn_seccion_ver_mas botones_innova">
		<a href="/productos">Ver mas productos</a>
	</div>
</section>