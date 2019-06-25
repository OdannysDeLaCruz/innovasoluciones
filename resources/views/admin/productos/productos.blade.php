@extends('admin/layout')
	@section('title') 
		Productos de Innova
	@endsection
	@section('productos') active @endsection
	@section('contenido')
		<section class="col-12 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">Productos</h1>
				<div class="crear_productos">
					<a href="/admin/productos/nuevo">
						<span class="fa fa-plus crear_productos_icon"></span>
						Nuevo producto
					</a>
				</div>
			</header>
			
			<!-- BUSCAR PRODUCTOS -->
			<section class="filtro">
				<form class="form-inline filtro_form" action="" method="POST">
					<input type="text" name="descripcion_producto" class="filtro_form_input filtro_descripcion" placeholder="Descripción">

					<select name="categoria_producto" class="filtro_form_input filtro_categoria">
						<option>Categoria</option>
						@if(isset($categorias))
							@foreach($categorias as $categoria)
								<option value="{{ $categoria->id }}">{{ $categoria->categoria_nombre }}</option>
							@endforeach
						@endif
					</select>

					<input type="text" name="referencia_producto" class="filtro_form_input filtro_referencia" placeholder="Referencia">

					<input type="number" min="1" name="precio_producto" class="filtro_form_input filtro_precio" placeholder="0.0">

					<input type="date" name="fecha_producto" class="filtro_form_input filtro_fecha">

					<button type="submit" class="filtro_btn_filtrar">Buscar</button>
				</form>
			</section>
			<!-- FIN BUSCAR PRODUCTOS -->
			<!-- TABLA DE PRODUCTOS -->
			<section class="contenedor_tabla">
				<section class="contenedor_tabla_head">
					<span class="contenedor_tabla_head_titulos producto-img">Img</span>
					<span class="contenedor_tabla_head_titulos producto-nombre">Nombre</span>
					<span class="contenedor_tabla_head_titulos producto-categoria d-none d-md-block">Categoría</span>
					<span class="contenedor_tabla_head_titulos producto-ref">Referencia</span>
					<span class="contenedor_tabla_head_titulos producto-precio">Precio</span>
					<span class="contenedor_tabla_head_titulos producto-promocion d-none d-md-block">Promoción</span>
					<span class="contenedor_tabla_head_titulos producto-talla-color d-none d-md-block">Tallas <br> colores</span>
					<span class="contenedor_tabla_head_titulos producto-operaciones">Operaciones</span>
				</section>
				@if(isset($productos))
					@foreach($productos as $producto)
						<section class="contenedor_tabla_body">
							<span class="contenedor_tabla_body_titulos producto-img">
								<img class="producto_img" src='{{ asset("uploads/productos/imagenes/miniaturas/$producto->producto_imagen") }}'>			
							</span>
							<span class="contenedor_tabla_body_titulos producto-nombre">
								@if(strlen($producto->producto_nombre) > 10)
									{{ substr($producto->producto_nombre, 0, 60) . "..."  }}
								@else 
									{{ $producto->producto_nombre }}								
								@endif
							</span>
							<span class="contenedor_tabla_body_titulos producto-categoria d-none d-md-block">
								{{ $producto->categoria_nombre}}
							</span>
							<span class="contenedor_tabla_body_titulos producto-ref">{{ $producto->producto_ref }}</span>
							<span class="contenedor_tabla_body_titulos producto-precio">{{ number_format($producto->producto_precio, 0, '', '.') }}</span>
							<span class="contenedor_tabla_body_titulos producto-promocion d-none d-md-block">
								@if($producto->promo_tipo || $producto->promo_costo)
									{{ $producto->promo_tipo . ' - ' .$producto->promo_costo }}
								@else
									{{ '_ _ _' }}
								@endif
							</span>
							<span class="contenedor_tabla_body_titulos producto-talla-color d-none d-md-block">
								@php
									if($producto->producto_tallas || $producto->producto_colores) { 
										$data = $producto->producto_tallas . ", " . $producto->producto_colores;
										echo substr($data, 0, 25) . '...';
									}
									else {
										echo "_ _ _";
									}
								@endphp
							</span>
							<span class="contenedor_tabla_body_titulos producto-operaciones">
								<a data-toggle="tooltip" data-placement="top" title="Ver producto" href="{{ route ('getDetallesProducto', $producto->id ) }}">
									<span class="fa fa-edit mr-2 btn-ver-item"></span>
								</a>  |  
								<a class="btnEliminarProducto" data-toggle="tooltip" data-placement="top" title="Eliminar producto" href="{{ route ('eliminarProducto', $producto->id ) }}">
									<span class="fa fa-trash ml-2 btn-eliminar-item"></span>
								</a>
							</span>
						</section>

				@endforeach
				@else
				@endif
				@if($productos->links())
					<section class="paginacion_links">
						{{ $productos->links() }}
					</section>
				@endif
			</section>
			<!-- FIN TABLA DE PRODUCTOS -->
		</section>
		@if(session('producto-creado'))
			<script>
				alert('Producto creado correctamente');
			</script>
		@endif
		@if(session('mensaje'))
			<script>
				alert( '{{ session('mensaje') }}' );
			</script>
		@endif
	@endsection