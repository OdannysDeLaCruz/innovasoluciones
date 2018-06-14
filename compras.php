<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Compras realizadas | Usuario </title>
</head>
<body>

	<?php include_once('header.php'); ?>
	
	<section class="contenedor_perfil">
		<section class="perfil row">
			<nav class="col-xs-12 col-sm-4 perfil_menu">
				<ul class="perfil_menu_ul">
					<li><a href="/perfil.php">Perfil</a></li>
					<li><a class="active" href="/compras.php">Compras</a></li>
					<li><a href="/facturas.php">Facturas</a></li>
				</ul>
			</nav>
			<section class="col-xs-12 col-sm-8 pl-sm-2 compras">
				<h1 class="compras_titulo mt-2 mt-sm-0">Compras</h1>
				<div class="compras_pedido">
					<label class="compras_pedido_fecha">Fecha del pedido: 14/06/2018</label>
					<label class="compras_pedido_estado">Compra finalizada</label>
					<label class="compras_pedido_info">
						<img class="compras_pedido_info_img" src="img/reloj.jpg"></img>
						<div class="compras_pedido_info_datos">
							<label class="compras_pedido_info_nombre">Celular Samsung Galaxy J7 Prime Lte Ds - 32 Gb Blanco Dorado</label>
							<label class="compras_pedido_info_monto">$ 723.000 x 1 unidad</label>	
						</div>
					</label>
				</div>
				<div class="compras_pedido">
					<label class="compras_pedido_fecha">Fecha del pedido: 14/06/2018</label>
					<label class="compras_pedido_estado">Compra finalizada</label>
					<label class="compras_pedido_info">
						<img class="compras_pedido_info_img" src="img/celular.jpg"></img>
						<div class="compras_pedido_info_datos">
							<label class="compras_pedido_info_nombre">Celular Samsung Galaxy J7 Prime Lte Ds - 32 Gb Blanco Dorad</label>
							<label class="compras_pedido_info_monto">$ 799.000 x 1 unidad</label>	
						</div>
					</label>
				</div>

			</section>
		</section>		
	</section>

	<footer>
		Footer
	</footer>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<script src="js/app.js"></script>
</body>
</html>