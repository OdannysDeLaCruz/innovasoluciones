<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Verificación | Innova Soluciones</title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION DE PAYMENT -->
	<section class="contenedor_payment row">
		<!-- Div para hacer un layout -->
		<div class="col-md-8 seccion_payment_proceso">
			<section id="detalles" class="payment_proceso payment_activo">
				<h1 class="payment_titulos">Detalles del pedido</h1>		
				<section class="payment_proceso_tarjeta tarjeta_detalle_pedido">
					@foreach($cart as $carrito)
						<section class="pedido">
							<a target="_blank" href="/productos/{{ $carrito['id'] }}-{{ $carrito['descripcion'] }}">
								<img class="pedido_img" src="{{ $carrito['imagen'] }}">						
							</a>
							<div class="pedido_info">
								<a target="_blank" href="/productos/{{ $carrito['id'] }}-{{ $carrito['descripcion'] }}">
									<h1 class="pedido_info_nombre">{{ $carrito['descripcion'] }}</h1>
								</a>
								<label class="pedido_info_precio">
									Precio: <b>${{ number_format($carrito['precio'], 2) }} </b>
								</label>
								<label class="pedido_info_cantidad">
									Cantidad: <b>{{ $carrito['cantidad'] }}</b>
								</label>
								@if($carrito['promocion'] != '')
									<label class="pedido_info_precio">
										Descuento x unidad: <b> {{ $carrito['promocion'] }} </b>
									</label>								
								@endif
								<label class="pedido_info_precio">
									Total: <b>${{ number_format($carrito['total'], 2) }} </b>
								</label>
							</div>
						</section>
					@endforeach
				</section>
				<section id="tarjeta_codigo_descuento" class="payment_proceso_tarjeta tarjeta_codigo_descuento">
					<div class="codigo_descuento" id="codigo_descuento">
						<form action="{{ route('verificarCodigo') }}" method="POST" >
							{{ csrf_field() }}
							<div class="form-group 
								d-flex
								flex-column
								flex-sm-row
								justify-content-around
								justify-content-sm-end 
								align-items-center
								justify-content-end	
								">
								
								@if(session('Errors')) 
									<script>
										alert(" {{ session('Errors') }} ");
									</script>
								@endif
								
								<label style="margin: 0;" for="codigo">
									¿Tienes algún código de descuento? 
									<small class="text-muted">(opcional)</small>
								</label>
								
								<input type="text" id="codigo" name="codigo_descuento" value="{{ session('codigo_verificado') ? session('codigo_verificado') : '' }}" required>

								<button type="submit" class="btn_enviar_codigo mt-1 mt-sm-0" name="verificarCodigo">
									Descontar
								</button>
							</div>
							@if (session('Errors'))
				                <span class="invalid-feedback" role="alert" style="font-size: 15px;">
				                    <strong>{{ session('Errors') }}</strong>
				                </span>
			                @endif
						</form>
					</div>			
					<!-- Si el descuento se realiza correctamente, envio un msm y oculto el bloque codigo_descuento -->
					@if(session('descuento_realizado') == true)
						@if(session('noticia_descuento'))
							<script>
								alert(" {{ session('noticia_descuento') }} ");
							</script>
						@endif
						<script>
							document.getElementById('tarjeta_codigo_descuento').style.display = "none";				
						</script>

						<span class="valid-feedback">
		                    <strong>{{ session('noticia_descuento') }}</strong>
		                </span>					
					@endif
					<!-- Si hay mas de un codigo usado, oculto el bloque codigo_descuento -->
					@if(session('codigos_usados') > 1)
						<script>
							document.getElementById('codigo_descuento').style.display = "none";
						</script>
					@endif
				</section>
				<section class="payment_proceso_tarjeta tarjeta_botones_pedidos">
					<div class="pedidos_botones">
						<div class="pedidos_botones_btn botones_innova">
							<a href="{{ route('productos') }}"><i class="fa fa-arrow-left"></i>Seguir comprando</a>
						</div>
						<div class="pedidos_botones_btn botones_innova">
							<a id="btn_siguiente" href="#">Siguiente <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>			
				</section>			
			</section>
			<section id="datos_envio" class="payment_proceso payment_envio">
				<h1 class="payment_titulos">¿Donde quieres recibirlo?</h1>
				<small>Si deseas recibir el pedido a otra dirección cambiela desde su cuenta de perfil.</small>

				<section class="payment_proceso_tarjeta tarjeta_direccion_envio">
					<div class="direccion_envio">
						<span class="fa fa-map-marker direccion_envio_icono"></span>
						<span class="direccion_envio_texto">
							<b> {{ Auth::user()->usuario_direccion }} </b>
							<small>
								{{ Auth::user()->usuario_barrio }} - {{ Auth::user()->usuario_ciudad }} - {{ Auth::user()->usuario_pais }}							
							</small>
						</span>
					</div>
					<a href="{{ route('perfil') }}" class="direccion_link">Editar esta dirección</a>
				</section>

				<h1 class="payment_titulos">¿Como desea recibir el pedido?</h1>

				<section class="payment_proceso_tarjeta tarjeta_tipo_envio">
					@if($tipo_entregas)
						@foreach($tipo_entregas as $tipo)
							<section class="tarjeta_envio_domicilio">
								<form class="form_opcion_envio" action="{{ route('payment') }}" method="POST">
									{{ csrf_field() }} 
									<input type="hidden" name="tipo_entrega" value="{{ $tipo->id }}">
									<button class="btn_opcion_envio">
										<span class="text_opcion_envio">
											{{ $tipo->envio_metodo }} <br>

											@if($tipo->envio_metodo == 'Tienda fisica')
												<small style="color: #333;">Calle 6 # 42-90 Valledupar - Colombia</small>												
											@endif
										</span>
									</button>
								</form>
							</section>
						@endforeach
					@endif				
				</section>

				<section class="payment_proceso_tarjeta tarjeta_ver_detalle_pedido">
					<div class="botones_innova">
						<a id="btn_ver_detalles" href="#">
							<i class="fa fa-arrow-left mr-2"></i>
							Ver detalles
						</a> 
					</div>
				</section>				
			</section>			
		</div>
		<div class="col-md-4 seccion_resumen_pedido">
			<section class="payment_proceso_tarjeta tarjeta_resumen_pedido">
				<span class="payment_proceso_tarjeta titulo_resumen_table">
					<strong>Resumen del pedido</strong>
				</span>
				<table class="table table-bordered resumen_table">
					<tr>
				    	<th>Productos ({{ $cantidad_productos }})</th>
				    	<td>${{ number_format( $total_del_pedido, 0, ',', '.')  }}</td>
				  	</tr>
				  	@if($descuento_peso > 0)
				  	<tr>
				    	<th>Descuento por código</th>
				    	<td>${{ number_format( $descuento_peso, 0, ',', '.')  }}</td>
				  	</tr>
				  	@endif
				  	<tr>
				    	<th style="font-weight: 400;">TOTAL A PAGAR</th>
				    	<td>${{  number_format($total_pagar, 0, ',', '.') }}</td>
				  	</tr>
				</table>
			</section>
		</div>
	</section>
	<!-- FIN SECCION DE PAYMENT -->
	
	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>