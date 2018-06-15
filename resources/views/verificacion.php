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
	
	<?php include_once('header.php'); ?>
	<?php include_once('carrito.php'); ?>
	
	<!-- SECCION MENU PROCESO DE PAGO -->
	<nav class="menu_proceso_pago">
		<ul>
			<li id="indicador_detalle" class="items active">Detalles</li>
			<li id="indicador_envio" class="items datos_envio">Enviar a</li>
			<!-- <li id="indicador_pagar" class="items pagar">Pagar</li> -->
		</ul>
	</nav>
	<!-- FIN SECCION MENU PROCESO DE PAGO -->
	<!-- SECCION DE PAYMENT -->
	<section class="contenedor_payment">
		<section id="detalles" class="payment_proceso detalles payment_activo">
			<h1 class="payment_titulos">Detalles del pedido</h1>
			<section class="pedido">
				<img class="pedido_img" src="img/reloj.jpg">
				<div class="pedido_info">
					<h1 class="pedido_info_nombre">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h1>
					<label class="pedido_info_cantidad">Cantidad: <b>1</b> </label>
					<label class="pedido_info_precio">Precio: <b>$ 250.000 COP </b> </label>
				</div>
			</section>
			<section class="pedido">
				<img class="pedido_img" src="img/celular.jpg">
				<div class="pedido_info">
					<h1 class="pedido_info_nombre">Lorem ipsum dolor sit amet, consectetur.</h1>
					<label class="pedido_info_cantidad">Cantidad: <b>1</b> </label>
					<label class="pedido_info_precio">Precio: <b>$ 250.000 COP </b> </label>
				</div>
			</section>
			<div class="pedidos_total">
				Total hasta ahora : <span class="total"> $ 250.000 COP </span>
			</div>
			<div class="pedidos_botones">
				<div class="botones_innova pedidos_botones_btn">
					<a href="/productos.php"><i class="fa fa-arrow-left"></i>Seguir comprando</a>
				</div>
				<div class="botones_innova pedidos_botones_btn">
					<a id="btn_siguiente" href="#">Siguiente <i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</section>
		<section id="datos_envio" class="payment_proceso payment_envio">
			<h1 class="payment_titulos">Datos del envio</h1>

			<form action="/payment.php" method="post" class="formulario_datos_envio needs-validation">
				<div class="form-control">
					<label for="nombre">Nombre completo <span class="required">*</span></label>
					<input id="nombre" class="datos_inputs" type="text" name="nombre_completo" required>
					<div class="valid-feedback">
				        Looks good!
				    </div>
				</div>
				<div class="form-control">
					<label for="direccion">Dirección <span class="required">*</span></label>
					<input id="direccion" class="datos_inputs" type="text" name="direccion" required>
				</div>
				<div class="form-control">
					<label for="pais">Pais<span class="required">*</span></label>
					<select id="pais" class="datos_inputs" type="text" name="pais" required>
						<option value="colombia">Colombia</option>
					</select>
				</div>
				<div class="form-control">
					<label for="ciudad">Ciudad<span class="required">*</span></label>
					<input id="ciudad" class="datos_inputs" type="text" name="ciudad" required>
				</div>
				<div class="form-control">
					<label for="barrio">Barrio<span class="required">*</span></label>
					<input id="barrio" class="datos_inputs" type="text" name="barrio" required>
				</div>
				<div class="form-control">
					<label for="telefono">Telefono<span class="required">*</span></label>
					<input id="telefono" class="datos_inputs" type="text" name="telefono" required>
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