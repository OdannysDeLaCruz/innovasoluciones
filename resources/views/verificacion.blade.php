

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
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
	
	<!-- SECCION MENU PROCESO DE PAGO -->
	<nav class="menu_proceso_pago">
		<ul>
			<li id="indicador_detalle" class="items active">Detalles</li>
			<li id="indicador_envio" class="items datos_envio">Enviar a</li>
		</ul>
	</nav>
	<!-- FIN SECCION MENU PROCESO DE PAGO -->
	<!-- SECCION DE PAYMENT -->
	<section class="contenedor_payment">
		<section id="detalles" class="payment_proceso detalles payment_activo">
			<h1 class="payment_titulos">Detalles del pedido</h1>
		
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
						<label class="pedido_info_precio">
							Descuento: <b>${{ number_format($carrito['descuento_peso'], 2) }} </b>
						</label>
						<label class="pedido_info_precio">
							Total: <b>${{ number_format($carrito['total'], 2) }} </b>
						</label>
					</div>
				</section>
			@endforeach

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
			@if(session('noticia_descuento'))
				<script>
					alert(" {{ session('noticia_descuento') }} ");
					document.getElementById('codigo_descuento').style.display = "none";
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

			<div class="resumen_pedidos">
				Total Neto: <span class="total_neto"> ${{ number_format( $total_del_pedido, 2)  }} </span>
			</div>
			<div class="resumen_pedidos">
				Descuento por codigo: 
				<span class="descuento_codigo"> 
					{{  number_format( $descuento_peso, 2) }}
				</span>
			</div>
			<div class="resumen_pedidos">
				Costo de envío: <span class="costo_envio"> ${{ number_format( $costo_envio, 2 ) }} </span>
			</div>
			<div class="resumen_pedidos">
				Impuesto (IVA): <span class="impuesto_iva"> ${{ number_format( $iva, 2 ) }} </span>
			</div>
			<div class="resumen_pedidos">
				TOTAL A PAGAR: <span class="total_pagar"> ${{  $total_pagar }} </span>
			</div>
			<div class="pedidos_botones">
				<div class="botones_innova pedidos_botones_btn">
					<a href="{{ route('productos') }}"><i class="fa fa-arrow-left"></i>Seguir comprando</a>
				</div>
				<div class="botones_innova pedidos_botones_btn">
					<a id="btn_siguiente" href="#">Siguiente <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</section>
		<section id="datos_envio" class="payment_proceso payment_envio">
			<h1 class="payment_titulos">Datos del envio</h1>

			<form action="{{ route('payment') }}" method="post" class="formulario_datos_envio needs-validation">
				{{ csrf_field() }}
				<div class="form-control">
					<label for="nombre">Nombre completo <span class="required">*</span></label>
					<input id="nombre" class="datos_inputs" type="text" name="nombre_completo" value="{{ Auth::user()->nombre }} {{ Auth::user()->apellido }}" required>
				</div>
				<div class="form-control">
					<label for="direccion">Dirección <span class="required">*</span></label>
					<input id="direccion" class="datos_inputs" type="text" name="direccion" value="{{ Auth::user()->direccion }}" required>
				</div>
				<div class="form-control">
					<label for="pais">Pais<span class="required">*</span></label>
					<select id="pais" class="datos_inputs" type="text" name="pais" required>
						<option value="{{ Auth::user()->pais }}">{{ Auth::user()->pais }}</option>
						<option value="Mexico">Mexico</option>
					</select>
				</div>
				<div class="form-control">
					<label for="ciudad">Ciudad<span class="required">*</span></label>
					<input id="ciudad" class="datos_inputs" type="text" name="ciudad" value="{{ Auth::user()->ciudad }}" required>
				</div>
				<div class="form-control">
					<label for="barrio">Barrio<span class="required">*</span></label>
					<input id="barrio" class="datos_inputs" type="text" name="barrio" value="{{ Auth::user()->barrio }}" required>
				</div>
				<div class="form-control">
					<label for="telefono">Telefono<span class="required">*</span></label>
					<input id="telefono" class="datos_inputs" type="text" name="telefono" value="{{ Auth::user()->telefono }}" required>
				</div>
				<div class="payment_datos_botones">
					<div class="botones_innova">
						<a id="btn_ver_detalles" href="#">
							<i class="fa fa-arrow-left"> </i>
							Ver detalles
						</a> 
					</div>
					<button type="submit" class="btn_datos_envio">
						Siguiente
						<i class="fa fa-arrow-right"></i>
						<i class="fa fa-credit-card-alt"></i>
					</button>
				</div>
			</form>
		</section>
	</section>
	<!-- FIN SECCION DE PAYMENT -->
	
	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>

</body>
</html>