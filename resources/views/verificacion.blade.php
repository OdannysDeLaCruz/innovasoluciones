<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

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
		<div class="col-lg-8 seccion_payment_proceso px-0 px-md-3">
			<section id="detalles" class="payment_proceso payment_activo">
				<h1 class="payment_titulos">Detalles del pedido</h1>

				<section class="payment_proceso_tarjeta tarjeta_detalle_pedido">
					@foreach($cart as $carrito)
						<section class="pedido">
							<div class="pedido-img">
								<a target="_blank" href="{{ route('descripcion', [ 'ref' => $carrito['producto_ref'], 'descripcion' => $carrito['nombre'] ]) }}">
									@php $url = "uploads/productos/imagenes/miniaturas/" . $carrito['imagen']; @endphp
									<img src="{{ $url }}">
								</a>
							</div>
							<div class="pedido-info">
								<ul class="pedido-info-list d-flex flex-column">
									<li class="pedido-info-list-item nombre-producto">
										<a target="_blank" href="{{ route('descripcion', [ 'ref' => $carrito['producto_ref'], 'descripcion' => $carrito['nombre'] ]) }}">
											{{ $carrito['nombre'] }}
										</a>
									</li>
									<?php 
										$color = $carrito['color'] != '' ? $carrito['color'] : '';
										$talla = $carrito['talla'] != '' ? $carrito['talla'] : '';
									?>
									<li class="pedido-info-list-item talla-producto">
										<b>
											@if($talla != '') Talla: {{ $talla }} | @endif
											@if($color != '') Color: {{ $color }} @endif
										</b>
									</li>


									@if($carrito['promocion'] != '')
										<li class="pedido-info-list-item promocion-producto">
											<span class="promocion-producto-precio-anterior">
												COP$ {{ number_format($carrito['precio'], 0, '', '.') }}
											</span>

											@if($carrito['promo_tipo'] == '%')
												<span class="promocion-producto-tag">
													{{ $carrito['promocion'] }} DCTO
												</span>
											@elseif($carrito['promo_tipo'] == '$')
												<span class="promocion-producto-tag">
													COP$ {{ number_format($carrito['promocion'], 0, '', '.') }} DCTO
												</span>
											@else
												<span class="promocion-producto-tag">
													{{ $carrito['promocion'] }}
												</span>
											@endif
										</li>
									@endif

									<li class="pedido-info-list-item nombre-opciones">
										<div class="nombre-opciones-items nombre-opciones-cantidad">
											<input style="width: 30px;" class="ml-2" type="number" min="1" max="10" value="{{ $carrito['cantidad'] }}" id="producto_{{ $carrito['id'] }}">
											<a  data-toggle="tooltip"
								      			data-placement="top"
								      			title="Actualizar cantidad"
								      			href="#"
								      			class="btn_actualizar_carrito"
								      			data-href="{{ route('updateItem', $carrito['id']) }}"
								      			data-id="{{ $carrito['id'] }}"
								      		>
									      		<div class="fa fa-refresh"></div>
									      	</a>
										</div>
									</li>

									<li class="pedido-info-list-item nombre-precio">
										COP$ {{ number_format($carrito['total'], 0, '', '.') }}
									</li>
									<div class="nombre-opciones-items nombre-opciones-eliminar">
										<a href="{{ route('deleteItem', $carrito['id']) }}" data-toggle="tooltip" data-placement="top" title="Eliminar">
					      					<span class="fa fa-trash-o"></span>
					      				</a>
									</div>
								</ul>
							</div>
						</section>
					@endforeach
				</section>

				<!-- SECCION CODIGO DE DESCUENTO -->
				<section id="tarjeta_codigo_descuento" class="payment_proceso_tarjeta tarjeta_codigo_descuento">
					<div class="codigo_descuento" id="codigo_descuento">
						<form action="{{ route('verificarCodigo') }}" method="POST" >
							{{ csrf_field() }}
							<div class="form-group d-flex flex-column flex-sm-column justify-content-around justify-content-sm-end align-items-center justify-content-end">
								
								@if(session('Errors')) 
									<script>
										alert(" {{ session('Errors') }} ");
									</script>
								@endif
								
								<label style="margin: 0;" for="codigo" class="text-center">
									¿Tienes algún código de descuento? 
									<small class="text-muted">(opcional)</small>
								</label><br>
								<div class="p-2 d-flex flex-column flex-sm-row justify-content-center">
									<input class="my-1 mx-1" type="text" id="codigo" name="codigo_descuento" value="{{ session('codigo_verificado') ? session('codigo_verificado') : '' }}" placeholder="Escribe tu código" required>
									<button type="submit" class="btn_enviar_codigo my-1 mx-1" name="verificarCodigo">
										Aplicar código
									</button>
								</div>
							</div>
							@if (session('Errors'))
				                <span class="invalid-feedback text-center" role="alert" style="font-size: 15px;">
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

				<!-- SECCION BOTONES DE PEDIDO -->
				<section class="payment_proceso_tarjeta tarjeta_botones_pedidos">
					<div class="pedidos_botones">

						<a class="btn-innova btn-secundario" href="{{ route('productos') }}">
							<i class="fa fa-arrow-left mr-2"></i> Comprar más
						</a>

						<?php $url = route('verificar') . '?s=datos_envio'; ?>

						<a class="btn-innova btn-principal" 
						   href="{{ route('verificar') }}?s=datos_envio" 
						   id="btn_siguiente"
						   onclick="history.pushState(null, '', '<?php echo $url ?>' ) ">
							Siguiente <i class="fa fa-arrow-right ml-2"></i>
						</a>
	
					</div>			
				</section>
			</section>

			<!-- SECCION DIRECCION DE ENVIO DE PEDIDO -->
			<section id="datos_envio" class="payment_proceso payment_envio">
				<h1 class="payment_titulos">¿A que dirección deseas recibirlo?</h1>

				<section class="payment_proceso_tarjeta tarjeta_direccion_envio" id="seccionDirecciones">
					@if(isset($direcciones))
						<!-- Cargador de espera -->
						<div class="tarjeta_direccion_envio_cargador" id="cargador_direccion_defecto">
							<img src="{{ asset('img/logos/cargador.gif') }}">
						</div>
						@foreach($direcciones as $direccion)
							@php
								$defecto = $direccion->defecto ? 'defecto' : ''
							@endphp

							<div class="direccion_envio {{ $defecto }} direccion_defecto_id">
								<p class="direccion_envio_texto {{ $defecto }}" data-href="{{ route('establecer-direccion-defecto') }}" data-defecto="{{ $defecto }}" data-direccion-id="{{ $direccion->id }}">
									<span class="fa fa-check direccion_envio_texto_iconselect {{ $defecto }}"></span>
									{{ "$direccion->nombre_completo" }} <br> {{ "$direccion->direccion, $direccion->ciudad, $direccion->estado, $direccion->codigo_postal, $direccion->pais" }}
								</p>
								<!-- tarjeta de detalle de dirección -->
								<span class="direccion_envio_tarjeta_flotante">
									<span class="items">
										<span class="icono fa fa-user"></span>
										<span class="texto"> {{ $direccion->nombre_completo }} </span>
									</span>
									<span class="items">
										<span class="icono fa fa-map-marker"></span>
										<span class="texto"> {{ $direccion->direccion }}, {{ $direccion->ciudad }}, {{ $direccion->estado }}, {{ $direccion->codigo_postal }} </span>
									</span>
									<span class="items">
										<span class="icono fa fa-globe"></span>
										<span class="texto"> {{ $direccion->pais }} </span>
									</span>
									<span class="items">
										<span class="icono fa fa-phone"></span>
										<span class="texto"> {{ $direccion->telefono }} </span>
									</span>
								</span>
								<span class="direccion_envio_opciones">
									<a href="#" data-href="{{ route('eliminar-direccion') }}" data-direccion-id="{{ $direccion->id }}" class="direccion_envio_opciones_eliminar">X</a>
								</span>
							</div>
						@endforeach	
						<div class="divisor"></div>
					@endif

					<div class="link_agregar_direccion">
						<a href="" class="direccion_link text-center btn-mostrar-form-cambio-direccion">
							<span class="fa fa-plus mr-2"></span> Agregar nueva dirección
						</a>
					</div>
				</section>
			
				<!-- Formulario cambiar dirección de envio del pedido -->
				<div class="contenedor-form-cambiar-direccion payment_proceso_tarjeta" id="seccion_form_agregar_direccion">
					<!-- Cargador de espera -->
					<div class="tarjeta_direccion_envio_cargador" id="cargador_agregar_direccion">
						<img src="{{ asset('img/logos/cargador.gif') }}">
					</div>
					<form class="form-cambiar-direccion" id="form_agregar_direccion" action="{{ route('agregar-direccion') }}" method="POST">
						@csrf
						<div class="form-cambiar-direccion-contenedor d-flex justify-content-center justify-content-md-start">
							<h4 class="form-cambiar-direccion-contenedor-titulo">
								Dirección de envío 
								<span class="btn-cerrar-form-cambio-direccion" id="">X</span>
							</h4>
							<!-- CAMPO NOMBRE -->
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="nombre_completo" id="nombre_completo" placeholder="Nombre de destinatario" required>
								<label class="form-cambiar-direccion-error" id="nombre_error"></label>
							</div>
							<!-- CAMPO PAIS -->
							<div class="form-group">
								<select class="form-cambiar-direccion-contenedor-inputs" name="pais" id="lista_paises" placeholder="Pais" required>
								</select>
								<label class="form-cambiar-direccion-error" id="pais_error"></label>
							</div>
							<!-- CAMPO Departamento / Estado / Provincia / Región -->
							<div class="form-group">
								<select id="lista_estados" class="form-cambiar-direccion-contenedor-inputs" name="estado" required>
									<option value="">Departamento / Estado / Provincia / Región</option>
								</select>
								<label class="form-cambiar-direccion-error" id="estado_error"></label>
							</div>
							<!-- CAMPO CIUDAD -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required>
								<label class="form-cambiar-direccion-error" id="ciudad_error"></label>
							</div>
							<!-- CAMPO DIRECCIÓN -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="direccion" id="direccion" placeholder="Dirección: calle, número, casa, barrio, etc..." required>						
								<label class="form-cambiar-direccion-error" id="direccion_error"></label>
							</div>
							<!-- CAMPO CODIGO POSTAL -->	
							<div class="form-group d-flex">
								<input class="form-cambiar-direccion-contenedor-inputs" type="number" name="codigo_postal" id="codigo_postal" placeholder="Codigo postal">	
								<label class="form-cambiar-direccion-error" id="codigo_postal_error"></label>
							</div>
							<!-- CAMPO TELEFONO -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="number" name="telefono" id="telefono" placeholder="Número de teléfono" required>	

								<label class="form-cambiar-direccion-error" id="telefono_error"></label>

								<p data-toggle="tooltip" data-placement="bottom" title="Le solicitamos su número de teléfono en caso de que necesitemos contactarlo con respecto a su pedido." class="form-cambiar-direccion-contenedor-tooltips">¿Por qué un teléfono?</p>
							</div>
						</div>

						<div class="form-group-btns">
							<input type="submit" id="btn_agregar_direccion" class="btn-cambiar-direccion" value="Guardar">
						</div>

					</form>
				</div>
				<!-- Fin Formulario -->


				<!-- SECCION TIPO DE ENVIO -->
				<section class="payment_proceso_tarjeta tarjeta_tipo_envio">
				<h1 class="payment_titulos">¿Como desea recibir el pedido?</h1>
					<section class="tarjeta_envio_domicilio">
						<!-- Cargador de espera -->
						<div class="tarjeta_direccion_envio_cargador" id="cargador_tipo_envio">
							<img src="{{ asset('img/logos/cargador.gif') }}">
						</div>
						@if($tipo_entregas)
							@foreach($tipo_entregas as $tipo)
								<form class="form_opcion_envio" action="{{ route('payment') }}" method="GET">
									<input type="hidden" name="tipo_entrega" value="{{ $tipo->id }}">
									<button class="btn_opcion_envio flex-column flex-sm-row justify-content-center">
										@if($tipo->envio_metodo == 'Tienda fisica')
											<span class="btn_opcion_envio_icono">
												<img src="{{ asset('img/logos/tienda.png') }}">								
											</span>
											<p class="btn_opcion_envio_texto text-center align-items-center align-items-sm-start mt-3 mt-sm-0">
												{{ $tipo->envio_metodo }}
												<small class="align-items-center align-items-sm-start text-center text-sm-left">Mz 15 Casa 6b - La Castellana, Valledupar - Colombia</small>												
											</p>
										@elseif($tipo->envio_metodo == 'Domicilio')
											<span class="btn_opcion_envio_icono">
												<img src="{{ asset('img/logos/domicilio.png') }}">				
											</span>
											<p class="btn_opcion_envio_texto align-items-center align-items-sm-start mt-3 mt-sm-0">
												{{ $tipo->envio_metodo }}
												<small class="align-items-center align-items-sm-start text-center text-sm-left">
													@if(isset($direcciones))
														@foreach($direcciones as $direccion)
															@if($direccion->defecto == true)
																{{ "Recibe: $direccion->nombre_completo" }} <br>
																{{ "$direccion->direccion, $direccion->ciudad" }}
															@endif
														@endforeach
													@endif
												</small>
											</p>
										@endif
									</button>
								</form>
							@endforeach
						@endif				
					</section>
				</section>

				<!-- SECCION BOTONES DE PEDIDO -->
				<section class="payment_proceso_tarjeta tarjeta_ver_detalle_pedido">
					<!-- <div class="botones_innova">
						<a id="btn_ver_detalles" href="{{route('verificar')}}">
							<i class="fa fa-arrow-left mr-2"></i>
							Ver detalles
						</a>
					</div> -->
					<a id="btn_ver_detalles" href="{{route('verificar')}}" class="btn-innova btn-principal">
						<i class="fa fa-arrow-left mr-2"></i>
						Volver a detalles
					</a> 
				</section>				
			</section>			
		</div>
		<div class="col-lg-4 seccion_resumen_pedido">
			<section class="payment_proceso_tarjeta tarjeta_resumen_pedidos">
				<span class="payment_proceso_tarjeta titulo_resumen_table">
					<strong>Resumen del pedido</strong>
				</span>
				<table class="table table-bordered resumen_table">
					<tr>
				    	<th>
				    		Productos <span class="resaltado">{{ $cantidad_productos }}</span>
				    	</th>
				    	<td>COP$ {{ number_format( $total_del_pedido, 0, '', '.') }} </td>
				  	</tr>
				  	@if($descuento_peso > 0)
				  	<tr>
				    	<th>
				    		<span class="resaltado">Descuento al pedido</span>
				    	</th>
				    	<td>COP$ {{ number_format( $descuento_peso, 0, '', '.') }} </td>
				  	</tr>
				  	@endif
				  	<tr>
				    	<th style="font-weight: 400;">TOTAL A PAGAR</th>
				    	<td class="resumen_total_pagar">COP$ {{  number_format($total_pagar, 0, '', '.') }} </td>
				  	</tr>
				</table>
			</section>
		</div>
	</section>
	<!-- FIN SECCION DE PAYMENT -->
	
	<!-- SECCION FOOTER -->
	<!-- @include('includes/footer')	 -->
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>