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
					<a href="/productos/{{ $nuevos['id'] }}-{{ $nuevos['producto_descripcion'] }}">
						<img src="{{ $nuevos['producto_imagen'] }}" class="producto_img" alt="{{ $nuevos['producto_descripcion'] }}">
					</a>
				</figure>

				<div class="producto_info">
					<a href="/productos/{{ $nuevos['id'] }}-{{ $nuevos['producto_descripcion'] }}">
						<h1 class="producto_titulo"> {{ $nuevos['producto_descripcion'] }}</h1>
					</a>
					@if($nuevos['promo_tipo'] == 'descuento%')
						<span class="producto_precio_anterior">
							<p class="descuento">
								-{{ $nuevos['promo_costo'] }}%
							</p>
							<p class="precio_anterior"> ${{ number_format($nuevos['producto_precio'], 2) }} </p>
						</span>

					@elseif($nuevos['promo_tipo'] == 'peso')
						<span class="producto_precio_anterior">
							<p class="descuento">
								-${{ $nuevos['promo_costo'] }} COP							
							</p>
							<p class="precio_anterior"> ${{ number_format($nuevos['producto_precio'], 2) }} </p>
						</span>
					@endif



					<label class="producto_precio">
						@php
						if($nuevos['promo_tipo'] == 'descuento%') {
							$descuento = $nuevos['producto_precio'] * ($nuevos['promo_costo'] / 100);
							$total = $nuevos['producto_precio'] - $descuento;
						}
						elseif($nuevos['promo_tipo'] == 'peso'){
							$total = $nuevos['producto_precio'] - $nuevos['promo_costo'];
						}
						@endphp
						<p>${{ number_format($total, 2) }} <small>COP</small></p>
					</label>					
				</div>
				
			</section>
		@endforeach

	</div>
</section>