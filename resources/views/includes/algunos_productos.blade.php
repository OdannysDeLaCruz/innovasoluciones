<section class="seccion_algunos_productos">
	<h1 class="seccion_algunos_productos_titulo">Estos son algunos de nuestros productos</h1>
	<div class="seccion_algunos_productos_content">

		@foreach($algunos_productos as $algunos)
			<section class="producto">
				<figure>
					<a href="/productos/{{ $algunos['id'] }}-{{ $algunos['descripcion'] }}">
						<!-- <img src="{{ $algunos['imagen'] }}" class="producto_img" alt="{{ $algunos['descripcion'] }}"> -->
						<img src="img/zapatos.jpg" class="producto_img">
					</a>
				</figure>
				<!-- <div class="producto_info">
					<a href="/productos/{{ $algunos['id'] }}-{{ $algunos['descripcion'] }}">
						<h1 class="producto_titulo"> {{ $algunos['descripcion'] }}</h1>
					</a>
					@if($algunos['descuento'] != 0)
						<span class="producto_precio_anterior">
							<p class="precio_anterior"> ${{ number_format($algunos['precio'], 2) }} </p>
							<p class="descuento">
							-{{ $algunos['descuento'] }}%
							</p>
						</span>
					@endif

					<label class="producto_precio">
						@php 
							$descuento = $algunos['precio'] * ($algunos['descuento'] / 100);
							$total = $algunos['precio'] - $descuento;
						@endphp
						<p>${{ number_format($total, 2) }} <small>COP</small></p>
					</label>					
				</div> -->
			</section>
		@endforeach

	</div>
	<div class="btn_seccion_ver_mas botones_innova">
		<a href="/productos">Ver mas productos</a>
	</div>
</section>