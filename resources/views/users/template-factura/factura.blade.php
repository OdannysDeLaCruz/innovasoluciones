
<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta charset="UTF-8">
	<title>Factura Innovasoluciones</title>

	<style type="text/css">
		@page { 
			margin: 40px 20px 20px; 
		}
		body {
			z-index: 1;
			font-family: Helvetica;
		}
		.header {
			width: 100%;
			height: 40px;
			margin-bottom: 10px;
			border-bottom: 1px solid #666;
			position: relative;
			top: 0;
			left: 0;
		}
		.logotipo {
			width: 150px;
			float: left;
		}
		.fecha_factura {
			float: right;
			font-size: 12px;
			color: #666;
			text-align: right;
			margin: 0;
		}
		.total_pagar {
			font-size: 15px;
			background: #0066ff;
			color: #fff;
			width: 250px;
			padding: 10px;
			text-align: center;
			border-radius: 5px;
			position: relative;
		}
		.total_pagar > h4 {
			margin: 0;
		}
		.info {
			width: 100%;
			display: inline-block;
			height: 120px;
			position: relative;
		}
		.info > div {
			width: 310px;
			height: auto;
			display: inline-block;
			padding: 10px;
		}
		.info_factura {
			background: #aedade;
			border: 1px solid #5190b4;
			border-radius: 5px;
			float: left;
		}
		.info_factura > div {
			display: block;
			font-size: 13px;
			color: #095B75;
			margin-bottom: 5px;
		}
		.info_importante {
			background: #ffbffe;
			border: 1px solid #ff429c;
			border-radius: 5px;
			float: right;
			padding: 10px !important;
		}
		.info_importante > h1 {
			font-size: 14px;
			color: #ff2467;
			margin: 0;
		}
		.info_importante > p {
			margin: 5px 0 0 0;
			font-size: 13px;
			color: #f26887;
			font-weight: bold;
		}
		.facturar, .enviar {
			width: 330px;
			margin: 0px;
			position: relative;
    	}
		.facturar th, .enviar th {
    		font-size: 13px;
    		width: 80px;
    	}
    	.facturar td, .enviar td {
    		font-size: 12px;
    		text-align: left;
    	}
		.detalle_titulo {
			border-top-right-radius: 5px;
			border-top-left-radius: 5px;
			background: #6a9ca4;
			color: #00313a;
			padding: 10px;
			margin: 0px;
			font-size: 13px;
			text-align: center;
		}
		.productos {
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    		font-size: 14px;
    		width: 100%; 
    		text-align: center;    
    		border-collapse: collapse; 
    	}
		.productos th {
			font-size: 13px;     
			font-weight: normal;     
			padding: 8px;     
			background: #b9c9fe;
    		border-top: 4px solid #aabcfe;    
    		border-bottom: 1px solid #fff; 
    		color: #00313a;
    		font-weight: bold;
    		text-align: center;
    	}
    	.productos td {
    		padding: 8px;     
    		background: #e8edff;     
    		border-bottom: 1px solid #fff;
    		color: #669;    
    		border-top: 1px solid transparent; 
    	}
    	.productos td.total {
    		font-weight: bold;
    	}
		.facturar,
		.enviar, 
		.procesamiento {
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
			font-size: 15px; 
			background: #e8edff;
			color: #669;
			margin: 30px 0;
		}
		.facturar th.titulos, 
		.enviar th.titulos, 
		.procesamiento th.titulos {
			font-size: 13px;     
			font-weight: normal;     
			padding: 5px;     
    		color: #00313a;
    		font-weight: bold;
    		text-align: left;
		}
		.facturar td, 
		.enviar td, 
		.procesamiento td {
			padding: 5px;     
			font-weight: bold;
		}
		.procesamiento td {
			text-align: right;
		}
		.procesamiento .total_pagar {
			background: #6A9CA4;
			color: #00313a;
		}
		.msm_envio {
			width: 290px;
		}
		.msm_envio p {
			font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;			
			font-size: 12px;
			color: #332;
			text-align: justify;
			margin: 0;
		}
		.footer {
			width: 100%;
			position: absolute;
			bottom: 0px;
			left: 0;
		}
		.footer > img {
			width: 100%;
		}
	</style>

</head>
<body>
	@include('users/template-factura/partials/header_factura')

	<div style="width: 100%; height: 50px;">
		<div class="total_pagar"><b>Total a pagar $ {{ number_format($total_pagar, 2) }}</b></div>				
	</div>

	<div class="info">
		<div class="info_factura">
			<div>Numero factura: {{ $datos_factura['id'] }}</div>
			<div><b>Fecha limite de pago: 03/05/2018</b> </div>
			<div>Metodo de pago: Payu </div>
			<div>Referencia de pago: <b>75318670-53</b></div>
		</div>
		<div class="info_importante">
			<h1>¡IMPORTANTE!</h1>
			<p>El pago de esta factura debe realizarse antes del tiempo limite de vencimiento, si no es así, el pedido realizado sera borrado de su cuenta. </p>
		</div>
	</div>
	
	<!-- TABLAS FACTURAR A Y ENVIAR A -->
	<div style="height: 180px;">
		<h1 class="detalle_titulo">DATOS DEL COMPRADOR  |  DIRECCIÓN DE ENVÍO</h1>
		<!-- TABLA DE DATOS DE FACTURACION DEL USUARIO -->
		<table class="facturar" style="float: left; margin: 0 20px 0 0; text-align: left;">
			<tr>
			    <th class="titulos">Nombre</th>
			    <td><b> {{ Auth::user()->nombre }} {{ Auth::user()->apellido }} </b></td>
			</tr>
			<tr>
			 	<th class="titulos">CC/NIT</th>
			 	<td><b>{{ Auth::user()->num_cedula }}</b></td>
			</tr>
			<tr>
				<th class="titulos">Dirección</th>
				<td>{{ Auth::user()->direccion }}, {{ Auth::user()->barrio }}</td>
			</tr>
			<tr>
				<th class="titulos">Ciudad</th>
				<td>{{ Auth::user()->ciudad }}</td>
			</tr>
		</table>
		<!-- TABLA DE DATOS DE ENVIO DEL PEDIDO -->
		<table class="enviar" style="float: right; margin: 0; text-align: left;">
			<tr>
				<th class="titulos">Dirección de envío</th>
				<td> {{ $datos_factura['direccion_envio'] }} </td>
			</tr>
		</table>
	</div>

	<!-- TABLA DE PRODUCTOS DEL PEDIDO -->
	<table class="productos">
		<caption>
			<h1 class="detalle_titulo">DETALLES DE SU PEDIDO</h1>
		</caption>
		<thead>
			<tr>
				<th>Cant</th>
				<th>Descripción</th>
				<th>Precio Unitario ($)</th>
				<th>Descuento ($)</th>
				<th>Total ($)</th>
			</tr>
		</thead>
		<tbody>
			@foreach($datos_detalles_factura as $detalle)
				<tr>
					<td>{{ $detalle['cantidad'] }}</td>
					<td>{{ $detalle['descripcion'] }}</td>
					<td>$ {{ number_format( $detalle['precio'], 2) }}</td>
					<td>$ {{ number_format( $detalle['descuento_peso'], 2 ) }}</td>
					<td class="total">$ {{ number_format( $detalle['importe_total'], 2 ) }}</td>
				</tr>
				
			@endforeach
		</tbody>
	</table>

	<!-- TABLA DE RESULTADO DE TOTALES DE PRECIO DE PEDIDOS-->
	<table class="procesamiento" style="width: 300px; float: right; margin-top: 10px;">
		<tr>
			<th class="titulos">Subtotal ($)</th>
		    <td>${{ number_format($subtotal, 2) }}</td>
		</tr>
		<tr>
		 	<th class="titulos">Descuento por codigo ($)</th>
		 	<td> 
				${{ number_format($valor_del_codigo, 2) }}
		 	</td>
		</tr>
		<tr>
		 	<th class="titulos">Costo de envío ($)</th>
		 	<td> 
		 		@if($datos_factura['envio'] == 0)
		 			{{ 'Envío gratis' }}
		 		@else 
					${{ number_format($datos_factura['envio'], 2) }}		 			
		 		@endif
		 	</td>
		</tr>
		<tr>
			<th class="titulos">Impuesto IVA ($)</th>
			<td>${{ number_format($iva, 2) }}</td>
		</tr>
		<tr>
			<th class="titulos total_pagar">TOTAL A PAGAR ($)</th>
			<td class="total_pagar">${{ number_format($total_pagar, 2) }}</td>
		</tr>
		<tr>
			<th>Atención:</th>
			<td class="msm_envio">
				<p>
					El pedido llegará dentro de los próximos 20 a 27 dias despues de efectuarse el pago de esta factura.
				</p>
			</td>
		</tr>
	</table>
		
	<!-- FOOTER DE LA FACTURA -->
	@include('users/template-factura/partials/footer_factura')

</body>
</html>