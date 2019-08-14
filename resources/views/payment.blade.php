<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/alertify.min.css"/>
	<!-- Semantic UI theme -->
	<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.11.2/build/css/themes/semantic.min.css"/>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title> Checkout | Innova Soluciones</title>
</head>
<body>
	
	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->

	<!-- SECCION PRINCIPAL -->
	<section class="contenedor_payment row">
		<div class="col-md-8 seccion_metodo_pago">
			<h2 class="payment_titulos mt-3 mb-4">Casi terminas, pagar con:</h2>
			<div class="payment_opciones d-flex justify-content-arrow justify-md-content-center">
				<!-- Cargador de espera -->
				<div class="tarjeta_direccion_envio_cargador" id="cargador_formulario_payu">
					<img src="{{ asset('img/logos/cargador.gif') }}">
				</div>
				<div class="payment_opciones_items">
					<form method="post" id="enviar-formulario-payu" class="payment_opciones_items_form_payu" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
						
					  	<input name="merchantId"    type="hidden"  value="{{ $dataPayu['merchantId'] }}">
					  	<input name="accountId"     type="hidden"  value="{{ $dataPayu['accountId'] }}" >
					  	<input name="description"   type="hidden"  value="{{ $dataPayu['description'] }}">
					  	<input name="extra2" id="pedido_id" type="hidden"  value="{{ $dataPayu['extra2'] }}">
					  	<input name="referenceCode" type="hidden"  value="{{ $dataPayu['referenceCode'] }}" >
					  	<input name="amount"        type="hidden"  value="{{ $dataPayu['amount'] }}"   >
					  	<input name="tax"           type="hidden"  value="{{ $dataPayu['tax'] }}"  >
					  	<input name="taxReturnBase" type="hidden"  value="{{ $dataPayu['taxReturnBase'] }}" >
					  	<input name="currency"      type="hidden"  value="{{ $dataPayu['currency'] }}" >
					  	<input name="signature"     type="hidden"  value="{{ $dataPayu['signature'] }}"  >
					  	<input name="test"          type="hidden"  value="{{ $dataPayu['test'] }}" >				  	
					  	<input name="buyerFullName" type="hidden"  value="{{ $dataPayu['buyerFullName'] }}" >
					  	<input name="buyerEmail"    type="hidden"  value="{{ $dataPayu['buyerEmail'] }}" >
					  	<input name="telephone"     type="hidden"  value="{{ $dataPayu['telephone'] }}" >			  	
					  	<input name="responseUrl"   type="hidden"  value="{{ $dataPayu['responseUrl'] }}" >
					  	<input name="confirmationUrl" type="hidden"  value="{{ $dataPayu['confirmationUrl'] }}" >
						
						<button type="submit" class="payment_opciones_items_form_btn_envio_dato px-3 py-1 px-md-5" id="crearPedidoPayu" data-route-crearpedido="{{ route('crear-pedido-payu') }}">
							<img src="{{ asset('img/logos/payu.png')}}">
						</button>
					</form>
				</div>
			</div>
			<a style="width: 200px;" class="btn btn-innova btn-principal" href="{{ route('verificar') }}">
				<span class="fa fa-arrow-left mr-2"></span> Volver a detalles
			</a>

			<h2 class="payment_subtitulos mt-5 mb-4">¿Qué medios de pagos te ofrecemos con PayU?</h2>

			<div class="payment_proceso_tarjeta seccion_metodo_pago_lista pt-4">
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/visa.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/davivienda.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/mastercard.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/american_express.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/pse.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/DinersClub_PayU.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/bancobog-1.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/codensa.png') }}"> </span>
				<span class="seccion_metodo_pago_lista_items"> <img src="{{ asset('img/metodos_pago/su_red.png') }}"> </span>
			</div>

			 
		</div>	
		<div class="col-md-4 seccion_resumen_pedido">
			<section class="payment_proceso_tarjeta tarjeta_resumen_pedidos">
				<span class="payment_proceso_tarjeta titulo_resumen_table">
					<strong>Resumen del pedido</strong>
				</span>
				<table class="table table-bordered resumen_table">
				  	<tr>
				    	<th>Productos ({{ $cantidad_productos }})</th>
				    	<td>$ {{ number_format( $total_del_pedido, 0, ',', '.')  }} <small>COP</small></td>
				  	</tr>
				  	@if($descuento_peso > 0)
				  	<tr>
				    	<th>Descuento por código</th>
				    	<td>$ {{ number_format( $descuento_peso, 0, ',', '.')  }} <small>COP</small></td>
				  	</tr>
				  	@endif
				  	<tr>
				    	<th style="font-weight: 400;">TOTAL A PAGAR</th>
				    	<td>$ {{  number_format($total_pagar, 0, ',', '.') }} <small>COP</small></td>
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