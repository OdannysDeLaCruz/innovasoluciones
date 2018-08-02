<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}" >
	<link rel="stylesheet" type="text/css" href="{{ asset('css/media-query.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
	<title>Innova Soluciones | Cart </title>
</head>
<body>
	@if(session('response'))
		<script>
			alert('Para ver los detalles del pedido, por favor añada productos al carrito');
		</script>
	@endif

	<!-- SECCION HEADER -->
	@include('includes/header')
	<!-- FIN HEADER -->	
	<!-- SECCION CARRITO -->
	<section class="contenedor_carrito">
		@if(count($cart))
			<section class="carrito table table-responsive">
				<table class="table table-hover">
				  	<thead>
					    <tr class="carrito_titulo">
					      	<th>Imagen</th>
							<th>Descripción</th>
							<th>Precio Unitario ($)</th>
					      	<th>Cant</th>
							<th>Descuento ($)</th>
							<th>Total a pagar ($)</th>
					      	<th>*</th>
					    </tr>
				  	</thead>
				  	<tbody>
				  		@foreach($cart as $carrito)
				  			<tr class="carrito_fila">
				  				<td scope="row">
				  					<a target="_blank" href="/productos/{{ $carrito['id'] }}-{{ $carrito['descripcion'] }}">
				  						<img class="carrito_fila_img" src="{{ $carrito['imagen'] }}" alt="{{ $carrito['descripcion'] }}">			
				  					</a>
					      		</td>
					      		<td class="carrito_fila_titulo">
					      			<p>
					      				<a target="_blank" href="/productos/{{ $carrito['id'] }}-{{ $carrito['descripcion'] }}">
					      					{{ $carrito['descripcion'] }} 
					      				</a>
							      	</p>					      					
					      		</td>
					      		<td class="carrito_fila_precio"><i>${{ number_format($carrito['precio'], 2) }}</i></td>
					      		<td class="carrito_fila_cantidad">
					      		<input 
					      			type="number" 
					      			min="1" 
					      			max="10" 
					      			value="{{ $carrito['cantidad'] }}"
					      			id="producto_{{ $carrito['id'] }}" 
					      		>
					      		<a 
					      			href="#"
					      			class="btn btn-primary btn-sm btn_actualizar_carrito"
					      			data-href="/cart/update/{{ $carrito['id'] }}"
					      			data-id="{{ $carrito['id'] }}" 	
					      		>
					      			<span  class="fa fa-refresh"></span>
					      		</a>
					      		<td class="carrito_fila_precio"><i>${{ number_format($carrito['descuento_peso'], 2) }}</i></td>
					      		<td class="carrito_fila_precio"><i>${{ number_format($carrito['total'], 2) }}</i></td>
					      		</td>
					      		<td class="carrito_fila_borrar">
					      			<a href="{{ route('deleteItem', $carrito['id']) }}">
					      				<span class="fa fa-trash-o"></span>
					      			</a>
					      		</td>
				  			</tr>
				  		@endforeach
				  	</tbody>
				</table>
			</section>
			<div class="suma_total_carrito">Total: ${{ number_format( session('total_del_pedido'), 2 ) }}</div>
			
			<span class="carrito_botones">
				<div class="btn_carrito_vaciar botones_innova">
					<a href="{{ route('productos') }}"><span class="fa fa-arrow-left mr-2"></span> Seguir comprando</a>
				</div>
				<div class="btn_carrito_pagar botones_innova">
					<a href="{{ route('verificar') }}"><span class="fa fa-credit-card-alt"></span> Comprar</a>
				</div>
			</span>
		@else 
			<h1 class="msm_carrito_vacio">{{ "No hay productos en el carrito" }}</h1>
			<label class="carrito_botones">
				<div class="btn_seguir_comprando botones_innova">
					<a href="{{ route('productos') }}"><span class="fa fa-arrow-left mr-2"> </span> Ver productos</a>
				</div>
			</label>
			<!-- Elimino el las variables de session codigos_usados y descuento_peso-->
			@php
				session()->put('codigos_usados', '');				
				session()->put('descuento_peso', '');				
			@endphp
		@endif
	</section>

	<!-- FIN SECCION CARRITO -->

	<!-- SECCION FOOTER -->
	@include('includes/footer')	
	<!-- FIN FOOTER -->
	
	<!-- SECCION SCRIPTS JS -->
	@include('includes/scripts')
	<!-- FIN SCRIPTS JS -->
</body>
</html>