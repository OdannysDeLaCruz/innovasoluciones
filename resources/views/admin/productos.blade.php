@extends('admin/layout')
	@section('title') 
		Productos de Innova
	@endsection
	@section('productos') active @endsection
	@section('contenido') 
		<section class="col-10 col-sm-10 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">productos</h1>
				<div class="crear_productos">
					<a href="/admin/productos/crear-nuevo">
						<span class="fa fa-plus crear_productos_icon"></span>
						Nuevo producto					
					</a>
				</div>
			</header>
			<!-- TABLA DE PRODUCTOS -->
			<section class="filtro">
				<form class="form-inline filtro_form" action="" method="POST">

					<input type="number" name="id_producto" class="form-control filtro_id" placeholder="Id">

					<input type="text" name="descripcion_producto" class="form-control filtro_descripcion" placeholder="Descripción">

					<select name="categoria_producto" class="form-control filtro_categoria">
						<option>Categorias</option>
						<option value="">Categoría 1</option>
						<option value="">Categoría 2</option>
						<option value="">Categoría 3</option>
					</select>

					<input type="text" name="referencia_producto" class="form-control filtro_referencia" placeholder="Referencia">

					<div class="input-group">
						<div class="input-group-prepend">
					    	<div class="input-group-text">$</div>
					    </div>
					    <input type="number" min="1" name="precio_producto" class="form-control filtro_precio" placeholder="Precio">
					</div>

					<input type="date" name="fecha_producto" class="form-control filtro_fecha">

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
							<th class="table_imagen">Img</th>
							<th class="table_descripcion">Descripción</th>
							<th class="table_categoria">Categoria</th>
							<th class="table_referencia">Referencia</th>
							<th class="table_precio">Precio unitario</th>
							<th class="table_desc">Desc</th>
							<th class="table_total">Total</th>
							<th class="table_tamano">Tamaño <br> color</th>
							<th class="table_fecha">Fecha creación</th>
							<th class="table_opcion"></th>
						</tr>
					</thead>
					<tbody>
						
						@if(isset($productos))
							@foreach($productos as $producto)
							<tr class="tables_admin_fila">
								<td>{{ $producto['id'] }}</td>
								<td>
									<img class="producto_img" src="{{ $producto['imagen'] }}">
								</td>
								<td class="producto_descripcion">
									{{ $producto['descripcion'] }}
								</td>
								<td>Lorem</td>
								<td>{{ $producto['referencia'] }}</td>
								<td>${{  number_format($producto['precio'], 2)}} </td>
								<td>{{ $producto['descuento'] }} %</td>
								<td>
									@php 
										$descuento = $producto['precio'] * ($producto['descuento'] / 100);
										$total = $producto['precio'] - $descuento;
									@endphp
									${{ number_format($total, 2) }} 
								</td>
								<td>{{ $producto['tamaño'] }} - {{ $producto['color'] }}</td>
								<td>{{ $producto['fecha_creado'] }}</td>
								<td class="menu_opcion">
									<i class="fa fa-ellipsis-h menu_opcion_logo" id="menu_opcion_logo_{{ $producto['id'] }}" aria-hidden="true"></i>
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
				<section class="paginacion_links">
					<p>Ver mas resultados </p>
					{{ $productos->links() }}					
				</section>
			</section>
		</section>
	@endsection