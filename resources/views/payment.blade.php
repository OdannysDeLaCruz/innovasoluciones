<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Productos | Innova Soluciones</title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION PRINCIPAL -->
	<section class="contenedor_payment row">
		<div class="col-md-8 seccion_metodo_pago">
			<h1 class="payment_titulos">¡Casi terminas, utilizamos Payu para brindarte diferentes formas de pago</h1>
			<ul class="payment_proceso_tarjeta seccion_metodo_pago_lista">
				<li><span class="fa fa-credit-card-alt fa-lg"></span> Tarjeta de crédito</li>
				<li><span class="fa fa-exchange fa-lg"></span> Debito bancario PSE</li>
				<li><span class="fa fa-money fa-lg"></span> Pago en efectivo</li>
				<li><span class="fa fa-university fa-lg"></span> Pago en bancos</li>
			</ul>
			<!-- Formulario de pago de PAYU -->
			<div id="formulario_payu" class="contenedor_formulario_payu payment_datos_botones">
				<form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
				  	<input name="merchantId"    type="hidden"  value="{{ $dataPayu['merchantId'] }}">
				  	<input name="accountId"     type="hidden"  value="{{ $dataPayu['accountId'] }}" >
				  	<input name="description"   type="hidden"  value="{{ $dataPayu['description'] }}">
				  	<input name="referenceCode" type="hidden"  value="{{ $dataPayu['referenceCode'] }}" >
				  	<input name="amount"        type="hidden"  value="{{ $dataPayu['amount'] }}"   >
				  	<input name="tax"           type="hidden"  value="{{ $dataPayu['tax'] }}"  >
				  	<input name="taxReturnBase" type="hidden"  value="{{ $dataPayu['taxReturnBase'] }}" >
				  	<input name="currency"      type="hidden"  value="{{ $dataPayu['currency'] }}" >
				  	<input name="signature"     type="hidden"  value="{{ $dataPayu['signature'] }}"  >
				  	<input name="test"          type="hidden"  value="{{ $dataPayu['test'] }}" >
				  	
				  	<input name="buyerFullName" type="hidden"  value="{{ $dataPayu['buyerFullName'] }}" >
				  	<input name="buyerEmail"    type="hidden"  value="{{ $dataPayu['buyerEmail'] }}" >
				  	<input name="telephone"    type="hidden"  value="{{ $dataPayu['telephone'] }}" >
				  	
				  	<input name="shippingAddress" type="hidden"  value="{{ $dataPayu['shippingAddress'] }}" >
				  	<input name="shippingCity"  type="hidden"  value="{{ $dataPayu['shippingCity'] }}" >
				  	<input name="shippingCountry" type="hidden"  value="{{ $dataPayu['shippingCountry'] }}" >
				  	
				  	<input name="responseUrl"   type="hidden"  value="{{ $dataPayu['responseUrl'] }}" >
				  	<input name="confirmationUrl" type="hidden"  value="{{ $dataPayu['confirmationUrl'] }}" >

					<section class="payment_proceso_tarjeta tarjeta_form_btn_payu">
						<button type="submit" class="btn_datos_envio">
							Pagar con 
							<img class="logo_payu" src="{{ asset('img/logos/payu.png')}}">
						</button>
					</section>
				</form>
			</div>
		</div>	
		<div class="col-md-4 seccion_resumen_pedido">
			<section class="payment_proceso_tarjeta tarjeta_resumen_pedido">
				<span class="payment_proceso_tarjeta titulo_resumen_table">
					<strong>Resumen de la pedido</strong>
				</span>
				<table class="table table-bordered resumen_table">
					<tr>
				    	<th>Producto</th>
				    	<td>${{ number_format( $total_pagar, 0, '', '.')  }}</td>
				  	</tr>
				  	<tr>
				    	<th style="font-weight: 400;">TOTAL A PAGAR</th>
				    	<td>${{  number_format($total_pagar, 0, '', '.') }}</td>
				  	</tr>
				</table>
			</section>
		</div>
	</section>
	<!-- FIN PRINCIPAL -->

	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->

</body>
</html>