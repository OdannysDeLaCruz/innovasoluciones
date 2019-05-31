@if($publicidad != '')
	<section class="seccion_publicidad">
		<!-- IMAGEN DE FONDO -->
		<img class="img_fondo_publicidad" src="img/futball.jpg">

		<div class="contenedor_publicidad row">			
			@foreach($publicidad as $producto)
				<?php 
					$ref  = $producto['producto_ref'];
					$nombre = str_replace(" ", "_", $producto['producto_nombre']);
				?>
				<div class="col-12 col-md-6 seccion_publicidad_mensaje">
					<span class="seccion_publicidad_titulo">{{ $producto->producto_nombre }}</span>
					<span class="seccion_publicidad_precio"> ${{ number_format($producto->producto_precio, 0, ',', '.') }}</span>
						
					<div class="btn_publicidad botones_innova">
						<a href="productos/{{ $ref }}-{{ $nombre }}">Ver detalles</a>
					</div>		
				</div>
				<figure class="col-12 col-md-6 seccion_publicidad_img">
					<a href="/productos/{{ $ref }}-{{ $nombre }}">
						<img src='{{ asset("storage/productos/imagenes/miniaturas/$producto->producto_imagen") }}' alt="{{ $producto->producto_nombre }}">						
					</a>
				</figure>
			@endforeach
		</div>
	</section>
@endif