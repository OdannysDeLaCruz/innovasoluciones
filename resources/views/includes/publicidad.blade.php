<section class="seccion_publicidad">
	<!-- IMAGEN DE FONDO -->
	<img class="img_fondo_publicidad" src="img/futball.jpg">

	<div class="contenedor_publicidad row">			
		@foreach($publicidad as $producto)
			<div class="col-12 col-md-6 seccion_publicidad_mensaje">
				<span class="seccion_publicidad_titulo">{{$producto['descripcion']}}</span>
				<span class="seccion_publicidad_precio"> $ {{ $producto['precio'] }} COP</span>
					
				<div class="btn_publicidad botones_innova">
					<a href="productos/{{ $producto['id'] }}-{{ $producto['descripcion'] }}">Ver detalles</a>
				</div>		
			</div>
			<figure class="col-12 col-md-6 seccion_publicidad_img">
				<img src="{{ $producto['imagen'] }}" alt="foto del producto">
			</figure>
		@endforeach
	</div>
</section>