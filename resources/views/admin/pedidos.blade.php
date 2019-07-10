@extends('admin/layout')
	@section('title') 
		Pedidos de los clientes
	@endsection
	@section('pedidos') active @endsection
	@section('contenido')
		<section class="col-12 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">Pedidos</h1>
			</header>

			<!-- BUSCAR PEDIDOS -->
			<section class="filtro">
				<form class="form-inline filtro_form" action="" method="POST">
					<input type="text" name="pedido_ref_venta" class="filtro_form_input filtro_pedido_ref" placeholder="Referencia">
					<input type="text" name="pedido_cliente_nombre" class="filtro_form_input filtro_nombre_cliente" placeholder="Nombre del cliente">
					<input type="text" name="pedido_cliente_apellido" class="filtro_form_input filtro_apellido_cliente" placeholder="Apellido del cliente">
					<select name="pedido_estado" class="filtro_form_input filtro_categoria">
						<option>Estados</option>
						<option value="0">En espera</option>
						<option value="4">Aprovada</option>
						<option value="6">Declinada</option>
						<option value="5">Expirada</option>
					</select>
					<input type="number" min="1" name="pedido_valor_transaccion" class="filtro_form_input filtro_precio" placeholder="0.0">

					<input type="date" name="pedido_fecha" class="filtro_form_input filtro_fecha">

					<button type="submit" class="filtro_btn_filtrar">Buscar</button>
				</form>
			</section>
			<!-- FIN BUSCAR PEDIDOS -->
			
			<!-- TABLA DE PEDIDOS -->
			<section class="contenedor_tabla">
				<section class="contenedor_tabla_head">
					<span class="contenedor_tabla_head_titulos_pedidos pedido-ref">Referencia</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-cliente">Nombre cliente</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-cliente">Apellido cliente</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-modo-envio d-none d-md-block">Modo envío</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-estado">Estado</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-total">Valor transacción</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-fecha d-none d-md-block">Fecha</span>
					<span class="contenedor_tabla_head_titulos_pedidos pedido-operaciones">Operaciones</span>
				</section>
				@if(isset($pedidos))
					@foreach($pedidos as $pedido)
						<section class="contenedor_tabla_body">
							<span class="contenedor_tabla_body_titulos_pedidos pedido-ref">
								{{ $pedido->pedido_ref_venta }}
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-cliente">
								{{ $pedido->usuario_nombre}}
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-cliente">
								{{ $pedido->usuario_apellido }}
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-modo-envio d-none d-md-block">
								{{ $pedido->envio_metodo }}
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-estado">
								@if($pedido->estado == 0 || $pedido->estado == '')
									<p class="estados pedidos_estado_espera"> {{ "En espera" }} </p>	
								@elseif($pedido->estado == 4) 
									<p class="estados pedidos_estado_aprovada"> {{ "Aprovado" }} </p>
								@elseif($pedido->estado == 6) 
									<p class="estados pedidos_estado_declinada"> {{ "Rechazado" }} </p>
								@elseif($pedido->estado == 5)
									<p class="estados pedidos_estado_expirada"> {{ "Expirado" }} </p>
								@endif
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-total">
								{{ $pedido->valor_transaccion }}
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-fecha d-none d-md-block">
								@dateformat($pedido->fecha_creado)
							</span>
							<span class="contenedor_tabla_body_titulos_pedidos pedido-operaciones">
								<a data-toggle="tooltip" data-placement="top" title="Ver pedido" href="">
									<span class="fa fa-edit mr-2 btn-ver-item" ></span>
								</a>  |  
								<a data-toggle="tooltip" data-placement="top" title="Eliminar pedido" href="">
									<span class="fa fa-trash ml-2 btn-eliminar-item" ></span>
								</a>
							</span>
						</section>
				@endforeach
				@else
				@endif
				@if($pedidos->links())
					<section class="paginacion_links">
						{{ $pedidos->links() }}
					</section>
				@endif
			</section>
			<!-- FIN TABLA DE PEDIDOS -->
		</section>
	@endsection