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
					<a href="/productos/{{ $nuevos['id'] }}-{{ $nuevos['descripcion'] }}">
						<img src="{{ $nuevos['imagen'] }}" class="producto_img" alt="{{ $nuevos['descripcion'] }}">							
					</a>
				</figure>

				<div class="producto_info">
					<a href="/productos/{{ $nuevos['id'] }}-{{ $nuevos['descripcion'] }}">
						<h1 class="producto_titulo"> {{ $nuevos['descripcion'] }}</h1>
					</a>
					@if($nuevos['descuento'] != 0)
						<span class="producto_precio_anterior">
							<p class="precio_anterior"> ${{ number_format($nuevos['precio'], 2) }} </p>
							<p class="descuento">
							-{{ $nuevos['descuento'] }}%
							</p>
						</span>
					@endif
					<label class="producto_precio">
						@php
							$descuento = $nuevos['precio'] * ($nuevos['descuento'] / 100);
							$total = $nuevos['precio'] - $descuento;
						@endphp
						<p>${{ number_format($total, 2) }} <small>COP</small></p>
					</label>					
				</div>
				
			</section>
		@endforeach

	</div>
</section>