<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/media-query.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<title> Facturas | Usuario </title>
</head>
<body>

	<?php include_once('header.php'); ?>
	
	<section class="contenedor_perfil">
		<section class="perfil row">
			<nav class="col-xs-12 col-sm-3 perfil_menu">
				<ul class="perfil_menu_ul">
					<li><a href="/perfil.php">Perfil</a></li>
					<li><a href="/compras.php">Compras</a></li>
					<li><a class="active" href="/facturas.php">Facturas</a></li>
				</ul>
			</nav>
			<section class="col-xs-12 col-sm-9 pl-sm-2 facturas">
				<h1 class="facturas_titulo mt-5 mt-sm-0">Facturas pendientes</h1>

				<div class="contenedor_table facturas_pendientes table table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Fecha de la factura</th>
								<th>Detalles</th>
								<th>Monto</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_sin_pagar">Sin pagar</td>
							</tr>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_sin_pagar">Sin pagar</td>
							</tr>
						</tbody>
					</table>
				</div>

				<h1 class="facturas_titulo mt-2 mt-sm-0">Facturas pagadas</h1>

				<div class="contenedor_table facturas_pagadas table table-responsive">
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="facturas_titulos">
								<th>Fecha de la factura</th>
								<th>Detalles</th>
								<th>Monto</th>
								<th>Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_pagadas">Pagada</td>
							</tr>
							<tr class="facturas_datos">
								<td>02/06/2018</td>
								<td><a href="">Ver</a> | <a href="">Descargar</a></td>
								<td>$ 200.000 COP</td>
								<td class="facturas_datos_estado_pagadas">Pagada</td>
							</tr>
						</tbody>
					</table>
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