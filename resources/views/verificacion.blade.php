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
							<a target="_blank" href="/productos/{{ $carrito['producto_ref'] }}-{{ $carrito['nombre'] }}">
								@php $url = "uploads/productos/imagenes/miniaturas/" . $carrito['imagen']; @endphp
								<img class="pedido_img" src="{{ $url }}">						
							</a>
							<div class="pedido_info">
								<a target="_blank" href="/productos/{{ $carrito['producto_ref'] }}-{{ $carrito['nombre'] }}">
									<h1 class="pedido_info_nombre">{{ $carrito['nombre'] }}</h1>
								</a>
								<div class="pedido_info_datos">
									<span class="pedido_info_datos_precio">
										Precio: <br> 
										<b>${{ number_format($carrito['precio'], 0, '', '.') }} </b>
									</span>
									<span class="pedido_info_datos_cantidad">

										Cantidad: <br> 
										<input style="width: 30px;" class="ml-2" type="number" min="1" max="10" value="{{ $carrito['cantidad'] }}" id="producto_{{ $carrito['id'] }}">
										<a
							      			data-toggle="tooltip"
							      			data-placement="top"
							      			title="Actualizar cantidad"
							      			href="#"
							      			class="btn btn-primary btn-sm btn_actualizar_carrito"
							      			data-href="/cart/update/{{ $carrito['id'] }}"
							      			data-id="{{ $carrito['id'] }}"
							      		>
								      		<i  class="fa fa-refresh icono_actualizar"></i>
								      	</a>
									</span>
									@if($carrito['promocion'] != '')
										<span class="pedido_info_datos_promocion">
											Desc x unidad: <br> 
											<b> {{ $carrito['promocion'] }} </b>
										</span>								
									@endif
									<span class="pedido_info_datos_total">
										Total: <br>
										<b>${{ number_format($carrito['total'], 0, '', '.') }} </b>
									</span>									
								</div>
							</div>
							<div class="pedido_opciones">
								
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
								<div>
									<input type="text" id="codigo" name="codigo_descuento" value="{{ session('codigo_verificado') ? session('codigo_verificado') : '' }}" required>
									<button type="submit" class="btn_enviar_codigo mt-1 mt-sm-0" name="verificarCodigo">
										Descontar
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
						<div class="pedidos_botones_btn botones_innova">
							<a href="{{ route('productos') }}"><i class="fa fa-arrow-left"></i>Seguir comprando</a>
						</div>
						<div class="pedidos_botones_btn botones_innova">
							<a href="/verificacion?s=datos_envio" id="btn_siguiente" onclick="history.pushState(null, '', '/verificacion?s=datos_envio');">Siguiente <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>			
				</section>
			</section>

			<!-- SECCION DIRECCION DE ENVIO DE PEDIDO -->
			<section id="datos_envio" class="payment_proceso payment_envio">
				<h1 class="payment_titulos">¿Donde quieres recibirlo?</h1>

				<section class="payment_proceso_tarjeta tarjeta_direccion_envio" id="seccionDirecciones">
					@if(isset($direcciones))
						<!-- Cargador de espera -->
						<div class="tarjeta_direccion_envio_cargador">
							<img src="{{ asset('img/logos/cargador.gif') }}">
						</div>
						@foreach($direcciones as $direccion)
							@php
								$defecto = $direccion->defecto ? 'defecto' : ''
							@endphp

							<div class="direccion_envio {{ $defecto }} direccion_defecto_id">
								<p class="direccion_envio_texto {{ $defecto }}" data-defecto="{{ $defecto }}" data-direccion-id="{{ $direccion->id }}">
									<span class="fa fa-check direccion_envio_texto_iconselect {{ $defecto }}"></span>
									{{ "$direccion->nombre $direccion->apellido | $direccion->direccion, $direccion->ciudad, $direccion->estado, $direccion->codigo_postal, $direccion->pais | $direccion->telefono" }}
								</p>
								<!-- tarjeta de detalle de dirección -->
								<span class="direccion_envio_tarjeta_flotante">
									<span class="items">
										<span class="icono fa fa-user"></span>
										<span class="texto"> {{ $direccion->nombre }} {{ $direccion->apellido }} </span>
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
									<a href="#" data-direccion-id="{{ $direccion->id }}" class="direccion_envio_opciones_eliminar">Eliminar</a>
								</span>
							</div>
						@endforeach								
					@endif
					<div class="link_agregar_direccion">
						<a href="" class="direccion_link text-center btn-mostrar-form-cambio-direccion" id="btn-mostrar-form-cambio-direccion">
							<span class="fa fa-plus mr-2"></span> Agregar nueva dirección de envío
						</a>
					</div>
				</section>
			
				<!-- Formulario cambiar dirección de envio del pedido -->
				<div class="contenedor-form-cambiar-direccion payment_proceso_tarjeta">
					<!-- Cargador de espera -->
					<div class="tarjeta_direccion_envio_cargador">
						<img src="{{ asset('img/logos/cargador.gif') }}">
					</div>
					<form class="form-cambiar-direccion" id="form_agregar_direccion" action="{{ route('agregar-direccion') }}" method="POST">
						@csrf
						<div class="form-cambiar-direccion-contenedor d-flex justify-content-center justify-content-md-start">
							<h4 class="form-cambiar-direccion-contenedor-titulo">Dirección de envío</h4>
							<!-- CAMPO NOMBRE -->
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="nombre" id="nombre" placeholder="Nombre" required>
								<label class="form-cambiar-direccion-error" id="nombre_error">Mensaje de error aqui</label>
							</div>
							<!-- CAMPO APELLIDO -->
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="apellido" id="apellido" placeholder="Apellido" required>
									<label class="form-cambiar-direccion-error" id="apellido_error"></label>
							</div>
							<!-- CAMPO PAIS -->
							<div class="form-group">
								<select class="form-cambiar-direccion-contenedor-inputs" name="pais" id="lista_paises" required>
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
								<input class="form-cambiar-direccion-contenedor-inputs" type="number" name="codigo_postal" id="codigo_postal" placeholder="Codigo postal" required>	
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
							<input type="reset" id="btn_cancelar_direccion" class="btn-cancelar-direccion btn-mostrar-form-cambio-direccion" value="Cancelar">
						</div>

					</form>
				</div>
				<!-- Fin Formulario -->

				<h1 class="payment_titulos">¿Como desea recibir el pedido?</h1>

				<section class="payment_proceso_tarjeta tarjeta_tipo_envio">
					<section class="tarjeta_envio_domicilio">
						@if($tipo_entregas)
							@foreach($tipo_entregas as $tipo)
								<form class="form_opcion_envio" action="{{ route('payment') }}" method="POST">
									{{ csrf_field() }} 
									<input type="hidden" name="tipo_entrega" value="{{ $tipo->id }}">
									<button class="btn_opcion_envio">
										@if($tipo->envio_metodo == 'Domicilio')
											<span class="fa fa-map-marker btn_opcion_envio_icono"></span>
											<p class="btn_opcion_envio_texto">
												{{ $tipo->envio_metodo }}
												<small style="color: #333;">Tu dirección</small>
											</p>

										@elseif($tipo->envio_metodo == 'Tienda fisica')
											<span class="fa fa-truck btn_opcion_envio_icono"></span>
											<p class="btn_opcion_envio_texto">
												{{ $tipo->envio_metodo }}
												<small style="color: #333;">Calle 6 # 42-90 Valledupar - Colombia</small>												
											</p>
										@endif
									</button>
								</form>
							@endforeach
						@endif				
					</section>
				</section>

				<section class="payment_proceso_tarjeta tarjeta_ver_detalle_pedido">
					<div class="botones_innova">
						<a id="btn_ver_detalles" href="/verificacion">
							<i class="fa fa-arrow-left mr-2"></i>
							Ver detalles
						</a> 
					</div>
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
	<!-- @include('includes/footer')	 -->
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>