@extends('admin/layout')
	@section('title') 
		Pedidos de los clientes
	@endsection
	@section('pedidos') active @endsection
	@section('contenido')
		<section class="col-10 col-sm-10 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">pedidos</h1>
			</header>
			<!-- TABLA DE PEDIDOS -->
			<section class="filtro">
				<form class="form-inline filtro_form" action="" method="POST">

					<input type="number" name="id_pedido" class="form-control filtro_id" placeholder="Id">
					<input type="text" name="direccion_pedido" class="form-control filtro_direccion" placeholder="Dirección">
					<input type="text" name="cliente_pedido" class="form-control filtro_cliente" placeholder="Cliente">
					
					<select name="modo_pago_pedido" class="form-control filtro_modo_pago">
						<option>Modo de pago</option>
						<option value="">Payu</option>
						<option value="">Efecty</option>
						<option value="">Transferencia Bancaria</option>
					</select>
					<select name="estado_pedido" class="form-control filtro_estado">
						<option>Estado</option>
						<option value="1">Pago</option>
						<option value="0">Pendiente</option>
					</select>
					<input type="text" name="codigo_descuento_pedido" class="form-control filtro_codigo" placeholder="Código de descuento">
					<div class="input-group">
						<div class="input-group-prepend">
					    	<div class="input-group-text">$</div>
					    </div>
					    <input type="number" min="1" name="total_pedido" class="form-control filtro_total" placeholder="Total">
					</div>
					<input type="date" name="fecha_pedido" class="form-control filtro_fecha">
					<button type="submit" class="filtro_btn_filtrar">
						<i class="fa fa-search"></i>
						Buscar
					</button>
				</form>
			</section>
			<section class="contenedor_tabla">
				<table class="table table-hover table-bordered tables_admin">
					<thead>
						<tr>
							<th class="table_id">ID</th>
							<th class="table_direccion">Dirección</th>
							<th class="table_direccion">Modo de entrega</th>
							<th class="table_cliente">Cliente</th>
							<th class="table_modo_pago">Pago</th>
							<th class="table_estado">Estado</th>
							<th class="table_codigo">Código desc</th>
							<th class="table_total">Total</th>
							<th class="table_fecha">Fecha</th>
							<th class="table_opcion"></th>
						</tr>
					</thead>
					<tbody>
						@if(isset($pedidos))
							@foreach($pedidos as $pedido)
							<tr class="tables_admin_fila">
								<td>{{ $pedido['id'] }}</td>								
								<td class="pedido_direccion">
									{{ $pedido['direccion'] }}
								</td>
								<td>
									{{ $pedido['entrega'] }}
								</td>
								<td>{{ $pedido['cliente'] }}</td>
								<td>{{ $pedido['modo_pago'] }}</td>
								<td>
									@if($pedido['estado'] == 'aprovado')
										<div class="pedido_estado exitoso">
											Pago exitoso
										</div>
									@else($pedido['estado'] == 'rechazado')
										<div class="pedido_estado rechazado">
											Pago rechazado
										</div>
									@endif
								</td>
								<td>{{ $pedido['codigo'] }}</td>
								<td>${{ number_format( $pedido['total'], 2 ) }} </td>
								<td>{{ $pedido['fecha'] }}</td>
								<td class="menu_opcion">
									<i class="fa fa-ellipsis-h menu_opcion_logo" id="menu_opcion_logo_{{ $pedido['id'] }}" aria-hidden="true"></i>
									<div class="menu_opcion_items">
										<a href="">Editar</a>
										<a href="">Eliminar</a>
									</div>
								</td>
							</tr>
							@endforeach
						@else
						@endif
					</tbody>
				</table>
				@if($misPedidos->links())
					<section class="paginacion_links">
						<p class="text-muted">Página {{ $misPedidos->currentPage() }} de {{$misPedidos->total()}} resultados</p>
						{{ $misPedidos->links() }}
					</section>
				@endif
			</section>
		</section>
	@endsection