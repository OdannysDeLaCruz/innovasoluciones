@if($publicidad != '')
	<section class="seccion_publicidad">
		<!-- IMAGEN DE FONDO -->
		<img class="img_fondo_publicidad" src="img/futball.jpg">

		<div class="contenedor_publicidad row">			
			@foreach($publicidad as $producto)
				<?php 
					$ref  = $producto['producto_ref'];
					$desc = str_replace(" ", "-", $producto['producto_descripcion']);
				?>
				<div class="col-12 col-md-6 seccion_publicidad_mensaje">
					<span class="seccion_publicidad_titulo">{{$producto['producto_descripcion']}}</span>
					<span class="seccion_publicidad_precio"> ${{ number_format($producto['producto_precio'], 0, ',', '.') }}</span>
						
					<div class="btn_publicidad botones_innova">
						<a href="productos/{{ $ref }}-{{ $desc }}">Ver detalles</a>
					</div>		
				</div>
				<figure class="col-12 col-md-6 seccion_publicidad_img">
					<a href="/productos/{{ $ref }}-{{ $desc }}">
						<img src="{{ $producto['producto_imagen'] }}" alt="foto del producto">						
					</a>
				</figure>
			@endforeach
		</div>
	</section>
@endif