
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="UTF-8">
	<title>FACTURA_{{ $pedido[0]['ref_venta'] }}</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/factura.css')}}">

</head>
<body>
	<div class="header">
		<div class="header-logotipo">
			<img src="{{ asset('img/logos/logo-innova-negro.png') }}">		
		</div>
		<div class="header-info">
			<p>Mz 15 Casa 6b La Castellana, Valledupar, Colombia</p>
			<p>https://www.innovainc.co | team@innovainc.co | +57 3023097029</p>
		</div>
	</div>

	<div style="margin: 30px 0px;">
		<h2 style="margin: 0px; font-size: 24px; color: #00313a;">FACTURA</h2>
		<p style="margin: 0 0 10px; font-size: 13px; color: #00313a;">REF: {{ $pedido[0]['ref_venta'] }}</p>
	</div>

	<div class="detalle-factura">
		<div class="bloque bloque-izquierdo">
			<ul class="bloque-items">
				<li class="bloque-item-titulo">
					<div>
						Fecha de emisión: <br>
						<p>@dateformatsimple( $pedido[0]['fecha_creado'] )</p>
					</div>
				</li>
				<li class="bloque-item-titulo">
					<div>
						Fecha limite: <br> 
						<p>24/08/2019</p>
					</div>									
				</li>
				<li class="bloque-item-titulo">
					<div>
						Facturar a: <br>
						<p style="line-height: 20px;">{{ Auth::user()->usuario_nombre . ' ' . Auth::user()->usuario_apellido }} <br> CC. {{ Auth::user()->usuario_cedula }}</p>
					</div>
				</li>
			</ul>
		</div>
		<div class="bloque bloque-derecho">
			<ul class="bloque-items">				
				<li class="bloque-item-titulo">
					<div>
						Enviar a: <br>
						<p style="line-height: 20px;">
							{{ $direccion['nombre_completo'] }} <br>
						</p> 
					</div>
				</li>
				<li class="bloque-item-titulo">
					<div>
						Dirección: <br>
						<p style="line-height: 20px;">
							{{ $direccion['direccion'] }} <br>
							{{ $direccion['ciudad'] }}, {{ $direccion['estado'] }}, {{ $direccion['codigo_postal'] }}, {{ $direccion['pais'] }}
						</p> 
					</div>					
				</li>
			</ul>
		</div>
	</div>
	<!-- TABLA DE RESUMEN DE PEDIDO -->
	<div class="contenedor-tabla-productos">
		<table class="productos">
			<thead>
				<tr>
					<th style="text-align: left; width: 300px;">Producto</th>
					<th style="text-align: right; width: 100px;">Precio (COP$)</th>
					<th style="text-align: right; width: 40px;">Cant</th>
					<th style="text-align: right; width: 100px;">DCTO</th>
					<th style="text-align: right; width: 100px;">Total (COP$)</th>
				</tr>
			</thead>
			<tbody>
				@foreach($detalles as $detalle)
					<tr>
						<td style="text-align: left;">{{ $detalle['detalle_nombre'] }}</td>
						<td style="text-align: right;"> {{ number_format($detalle['detalle_precio'], 0, '', '.') }} </td>
						<td style="text-align: right;"> {{ $detalle['detalle_cantidad'] }} </td>
						<td style="text-align: right;"> 
							@if($detalle['detalle_promo_tipo'] == '%')
					 			-{{ $detalle['detalle_promo_costo'] }}%
					 		@elseif($detalle['detalle_promo_tipo'] == '$')
					 			- {{ number_format($detalle['detalle_promo_costo'], 0, '', '.') }}
					 		@elseif($detalle['detalle_promo_tipo'] == '2x1')
					 			{{ '2x1' }}
					 		@endif
						</td>
						<td style="text-align: right;" class="total">{{ number_format($detalle['detalle_precio_final'], 0, '', '.') }}</td>
					</tr>					
				@endforeach
			</tbody>
		</table>
	</div>

	<!-- TABLA DE TOTAL -->
	<div class="contenedor-tabla-total">
		<table>
			<tr>
				<th class="titulos">Subtotal</th>
			    <td class="texto" style="font-weight: bold;"> COP$ {{ number_format($subtotal, 0, '', '.') }} </td>
			</tr>
			<tr>
			 	<th class="titulos">Descuento por código</th>
			 	<td class="texto"> 
			 		@if($pedido[0]['promo_tipo'] == '%')
			 			-{{ $costo_promo_pedido }}%
			 		@elseif($pedido[0]['promo_tipo'] == '$')
			 			COP$ {{ number_format($costo_promo_pedido, 0, '', '.') }}
			 		@endif
			 	</td>
			</tr>
			<tr>
			 	<th class="titulos">Costo de envío</th>
			 	<td class="texto"> Envio Gratís </td>
			</tr>
			<tr>
				<th class="titulos">IVA incluido</th>
				<td class="texto">19%</td>
			</tr>
			<tr class="total">
				<th class="titulos" style="color: #fff">TOTAL A PAGAR</th>
				<td class="texto" style="font-size: 17px; color: #fff; font-weight: bold;">
					COP$ {{ number_format($total, 0, '', '.') }}
				</td>
			</tr>
		</table>
	</div>

</body>
</html>