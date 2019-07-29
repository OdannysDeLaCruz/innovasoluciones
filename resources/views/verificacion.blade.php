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
		<div class="col-md-8 seccion_payment_proceso">
			<section id="detalles" class="payment_proceso payment_activo">
				<h1 class="payment_titulos">Detalles del pedido</h1>		
				<section class="payment_proceso_tarjeta tarjeta_detalle_pedido">
					@foreach($cart as $carrito)
						<section class="pedido">
							<a target="_blank" href="/productos/{{ $carrito['producto_ref'] }}-{{ $carrito['nombre'] }}">
									@php
										$url = "uploads/productos/imagenes/miniaturas/" . $carrito['imagen'];
									@endphp
								<img class="pedido_img" src="{{ $url }}">						
							</a>
							<div class="pedido_info">
								<a target="_blank" href="/productos/{{ $carrito['producto_ref'] }}-{{ $carrito['nombre'] }}">
									<h1 class="pedido_info_nombre">{{ $carrito['nombre'] }}</h1>
								</a>
								<label class="pedido_info_precio">
									Precio: <b>${{ number_format($carrito['precio'], 0, '', '.') }} </b>
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
									Total: <b>${{ number_format($carrito['total'], 0, '', '.') }} </b>
								</label>
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
							<!-- <a id="btn_siguiente" href="/verificacion?s=datos_envio">Siguiente <i class="fa fa-arrow-right"></i></a> -->
							<a href="/verificacion?s=datos_envio" id="btn_siguiente" onclick="history.pushState(null, '', '/verificacion?s=datos_envio');">Siguiente <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>			
				</section>
			</section>

			<!-- SECCION DIRECCION DE ENVIO DE PEDIDO -->
			<section id="datos_envio" class="payment_proceso payment_envio">
				<h1 class="payment_titulos">¿Donde quieres recibirlo?</h1>
				<!-- <small>Si deseas recibir el pedido a otra dirección cambiela desde su cuenta de perfil.</small> -->

				<section class="payment_proceso_tarjeta tarjeta_direccion_envio" id="seccionDirecciones">
					@if(isset($direcciones))
						@foreach($direcciones as $direccion)
							@php
								$defecto = $direccion->defecto ? 'defecto' : ''
							@endphp
							<div id="tarjeta_direccion_envio_cargador">
								<img src="{{ asset('img/logos/cargador.gif') }}">
							</div>

							<div class="direccion_envio {{ $defecto }} direccion_defecto_id" data-direccion-id="{{ $direccion->id }}">
								<p class="direccion_envio_texto {{ $defecto }}">
									<span class="fa fa-check direccion_envio_texto_iconselect"></span>
									{{ Auth::user()->usuario_nombre . ' ' . Auth::user()->usuario_apellido . ' | ' . "$direccion->direccion,  $direccion->ciudad, $direccion->estado, $direccion->codigo_postal, $direccion->pais" }}
								</p>
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
					<form class="form-cambiar-direccion" id="form_cambiar_direccion" action="{{ route('cambiar-direccion-envio') }}" method="POST">
						@csrf
						<div class="form-cambiar-direccion-contenedor d-flex justify-content-center justify-content-md-start">
							<h4 class="form-cambiar-direccion-contenedor-titulo">Dirección de envío</h4>
							<div class="form-group">
								<div class="form-group-interno">
									<!-- CAMPO NOMBRE -->
									<input class="form-cambiar-direccion-contenedor-inputs-interno" type="text" name="nombre" id="nombre" placeholder="Nombre" required value="{{ Auth::user()->usuario_nombre }}">
									<label class="form-cambiar-direccion-error" id="nombre_error">Mensaje de error aqui</label>

									<!-- CAMPO APELLIDO -->
									<input class="form-cambiar-direccion-contenedor-inputs-interno" type="text" name="apellido" id="apellido" placeholder="Apellido" required value="{{ Auth::user()->usuario_apellido }}">						
									<label class="form-cambiar-direccion-error" id="apellido_error">Mensaje de error aqui</label>					
								</div>
							</div>
							<!-- CAMPO PAIS -->
							<div class="form-group">
								<select class="form-cambiar-direccion-contenedor-inputs" name="pais" id="pais">
									<option>Pais</option>
									<option>Pais</option>
									<option>Pais</option>
									<option>Pais</option>
									<option>Pais</option>
								</select>
								<label class="form-cambiar-direccion-error" id="pais_error">Mensaje de error aqui</label>
							</div>

							<!-- CAMPO Departamento / Estado / Provincia / Región -->
							<div class="form-group">
								<select class="form-cambiar-direccion-contenedor-inputs" name="departamento" id="departamento">
									<option>Departamento / Estado / Provincia / Región</option>
									<option>Pais</option>
									<option>Pais</option>
									<option>Pais</option>
									<option>Pais</option>
								</select>
								<label class="form-cambiar-direccion-error" id="departamento_error">Mensaje de error aqui</label>
							</div>

							<!-- CAMPO CIUDAD -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="ciudad" id="ciudad" placeholder="Ciudad" required>						
								<label class="form-cambiar-direccion-error" id="ciudad_error">Mensaje de error aqui</label>
							</div>

							<!-- CAMPO DIRECCIÓN -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="text" name="direccion" id="direccion" placeholder="Dirección: calle, numero, casa, barrio, etc..." required>						
								<label class="form-cambiar-direccion-error" id="barrio_error">Mensaje de error aqui</label>
							</div>

							<!-- CAMPO CODIGO POSTAL -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="number" name="codigo_postal" id="codigo_postal" placeholder="Codigo postal" required>	
								<label class="form-cambiar-direccion-error" id="codigo_postal_error">Mensaje de error aqui</label>		
							</div>

							<!-- CAMPO TELEFONO -->	
							<div class="form-group">
								<input class="form-cambiar-direccion-contenedor-inputs" type="number" name="telefono" id="telefono" placeholder="Numro de teléfono" required value="{{ Auth::user()->usuario_telefono }}">	
								<label class="form-cambiar-direccion-error" id="telefono_error">Mensaje de error aqui</label>
								<a data-toggle="tooltip" data-placement="bottom" title="le solicitamos su número de teléfono en caso de que necesitemos contactarlo con respecto a su pedido." class="form-cambiar-direccion-contenedor-link" href="" id="btn-mostrar-form-cambio-direccion">¿Por qué un teléfono?</a>
							</div>
						</div>

						<div class="form-group-btns">
							<input type="submit" id="btn_cambiar_direccion" class="btn-cambiar-direccion" value="Guardar">
							<input type="reset" id="btn_cancelar_direccion" class="btn-cancelar-direccion btn-mostrar-form-cambio-direccion" value="Cancelar">
						</div>

					</form>

				</div>
				<!-- Fin Formulario -->

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
						<a id="btn_ver_detalles" href="/verificacion">
							<i class="fa fa-arrow-left mr-2"></i>
							Ver detalles
						</a> 
					</div>
				</section>				
			</section>			
		</div>
		<div class="col-md-4 seccion_resumen_pedido">
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