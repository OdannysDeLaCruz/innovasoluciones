<section class="seccion_nuevos">
	<label class="seccion_categorias_textos">
		<h1 class="seccion_nuevos_titulo">
			PRODUCTOS NUEVOS 
			<span class="estrellas">
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
				<i class="fa fa-star"></i>
			</span>
		</h1>
	</label>
	<div class="seccion_nuevos_carrusel">
		
		@foreach($productos_nuevos as $nuevos)
			<section class="producto">
				<figure>
					<img src="{{ $nuevos['imagen'] }}" class="producto_img" alt="{{ $nuevos['descripcion'] }}">
				</figure>
				<h1 class="producto_titulo">{{ $nuevos['descripcion'] }}</h1>
				<label class="producto_precio">$ {{ $nuevos['precio'] }} COP</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="productos/{{ $nuevos['id'] }}-{{ $nuevos['descripcion'] }}">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label>
			</section>
		@endforeach

	</div>
</section>