<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Productos | Confirmación de su compra</title>
</head>
<body>
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->
	@if (strtoupper($firma) == strtoupper($firmacreada))

		<section class="payment_proceso_tarjeta respuesta_trans">
			<section class="payment_proceso_tarjeta respuesta_trans_txt">
				@if($transactionState == 4)
					<h1 class="respuesta_trans_txt_titulo">{{ $estadoTx }}</h1>
					<span style="
					color:orange; 
					border: 8px solid #39E245;" 
					class="fa fa-check icono_respuesta"></span>					
				@elseif($transactionState == 7)
					<h1 class="respuesta_trans_txt_titulo">{{ $estadoTx }}</h1>
					<p style="
					font-size: 15px; 
					text-align: center;"
					class="text-muted">Nos pondremos en contacto con usted cuando haya respuesta de su pago.</p>
					<span style="color:orange; border: 8px solid orange;" class="fa fa-check icono_respuesta"></span>
				@endif

				<h1 class="respuesta_trans_txt_transaccion"><strong>Transacción: </strong>{{ $reference_pol }}</h1>
				<h1 class="respuesta_trans_txt_refventa"><strong>Ref. venta: </strong>{{ $referenceCode }}</h1>
			</section>
			<section class="payment_proceso_tarjeta respuesta_trans_table">
				<section class="respuesta_trans_table_costo">${{ number_format($TX_VALUE, 0, ',', '.') }} {{ $currency }}</section>
				<h1 class="respuesta_trans_table_titulo">Detalles de su compra</h1>
				<table class="table table-bordered">

					@if($pseBank != null)		
						<tr>
							<td>cus </td>
							<td>{{ $cus }}</td>
						</tr>
						<tr>
							<td>Banco </td>
							<td>{{ $pseBank }}</td>
						</tr>
					@endif
					<tr>
						<td>Descripción de venta</td>
						<td>{{ $extra1 }}</td>
					</tr>
					<tr>
						<td>Dirección de envio</td>
						<td>{{ $direccion_envio }}</td>
					</tr>
					<tr>
						<td>Forma de entrega</td>
						<td>{{ $forma_entrega }}</td>
					</tr>
					<tr>
						<td>Medio de pago</td>
						<td>{{ $lapPaymentMethod }} {{ $lapPaymentMethodType }}</td>
					</tr>
					<tr>
						<td>Fecha</td>
						<td></td>
					</tr>
				</table>
			</section>
			<section class="respuesta_trans_btn_opcion">
				<button>
					<a href="{{ route('productos') }}">Ver mas productos</a>				
				</button>
				<button>
					<a href="{{ route('pedidos') }}">Ver mis compras</a>
				</button>
			</section>
		</section>
	
	@else
		<section class="payment_proceso_tarjeta">
			<h1>Error validando firma digital.</h1>		
		</section>
	@endif


	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
	
</body>
</html>

