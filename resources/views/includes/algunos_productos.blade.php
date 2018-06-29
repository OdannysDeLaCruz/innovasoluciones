<section class="seccion_algunos_productos">
	<h1 class="seccion_algunos_productos_titulo">Estos son algunos de nuestros productos</h1>
	<div class="seccion_algunos_productos_content">

		@foreach($algunos_productos as $algunos)
			<section class="producto">
				<!-- <figure>
					<img src="{{ $algunos['imagen'] }}" class="producto_img" alt="{{ $algunos['descripcion'] }}">
				</figure>
				<h1 class="producto_titulo">{{ $algunos['descripcion'] }}</h1>
				<label class="producto_precio">$ {{ $algunos['precio'] }} COP</label>
				<label class="producto_botones">
					<div class="botones_innova">
						<a href="productos/{{ $algunos['id'] }}-{{ $algunos['descripcion'] }}">Detalles</a>
					</div>
					<div class="botones_innova">
						<a href="">Comprar</a>
					</div>
				</label> -->

				<figure>
					<a href="/productos/{{ $algunos['id'] }}-{{ $algunos['descripcion'] }}">
						<img src="{{ $algunos['imagen'] }}" class="producto_img" alt="{{ $algunos['descripcion'] }}">							
					</a>
				</figure>
				<div class="producto_info">
					<a href="/productos/{{ $algunos['id'] }}-{{ $algunos['descripcion'] }}">
						<h1 class="producto_titulo"> {{ $algunos['descripcion'] }}</h1>
					</a>
					<label class="producto_precio">$ {{ $algunos['precio'] }} COP</label>					
				</div>
			</section>
		@endforeach

	</div>
	<div class="btn_seccion_ver_mas botones_innova">
		<a href="/productos">Ver mas productos</a>
	</div>
</section>