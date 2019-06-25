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
			<?php 
				$ref  = $nuevos['producto_ref'];
				$nombre = str_replace(" ", "_", $nuevos['producto_nombre']);
			?>
			<section class="producto">
				<figure>
					<a href="/productos/{{ $ref }}-{{ $nombre }}">
						<img src='{{ asset("uploads/productos/imagenes/miniaturas/$nuevos->producto_imagen") }}' class="producto_img" alt="{{ $nuevos->producto_nombre }}">
					</a>
				</figure>
				<div class="producto_info">
					<a href="/productos/{{ $ref }}-{{ $nombre }}">
						<h1 class="producto_titulo"> {{ $nuevos['producto_nombre'] }}</h1>
					</a>

					@if($nuevos['promo_tipo'] == '%')
						<span class="producto_precio_anterior">
							<p class="descuento">
								-{{ $nuevos['promo_costo'] }}%
							</p>
							<p class="precio_anterior"> ${{ number_format($nuevos['producto_precio'], 0, ',', '.') }} </p>
						</span>

					@elseif($nuevos['promo_tipo'] == '$')
						<span class="producto_precio_anterior">
							<p class="descuento">
								-${{ number_format($nuevos['promo_costo'], 0, ',', '.') }}							
							</p>
							<p class="precio_anterior"> ${{ number_format($nuevos['producto_precio'], 0, ',', '.') }} </p>
						</span>
					@elseif($nuevos['promo_tipo'] == '2x1')
						<span class="producto_precio_anterior">
							<p class="descuento">
								{{ $nuevos['promo_tipo'] }}					
							</p>
						</span>
					@endif
				</div>

				<label class="producto_precio">
					@php
					if($nuevos['promo_tipo'] == '%') {
						$descuento = $nuevos['producto_precio'] * ($nuevos['promo_costo'] / 100);
						$total = $nuevos['producto_precio'] - $descuento;
					}
					elseif($nuevos['promo_tipo'] == '$'){
						$total = $nuevos['producto_precio'] - $nuevos['promo_costo'];
					}
					else {
						$total = $nuevos['producto_precio'];
					}
					@endphp
					<p>${{ number_format($total, 0, ',', '.') }} </p>		
				</label>
				
			</section>
		@endforeach

	</div>
</section>