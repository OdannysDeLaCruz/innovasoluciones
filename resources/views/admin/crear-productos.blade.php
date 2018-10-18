@extends('admin/layout')
	@section('title') 
		Productos de Innova
	@endsection
	@section('productos') active @endsection
	@section('contenido') 
		<section class="col-10 col-sm-10 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">productos / crear producto</h1>
			</header>
			
			<section class="contenedor_tabla">
				<form action="{{ route('createProductos') }}" method="post">
					{{ csrf_field() }}

					 @if ($errors->has('descripcion'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('descripcion') }}</strong>
	                    </span>
	                @endif

					<label>Descripción</label>
					<input type="text" name="descripcion">

					<label>Código de referencia</label>
					<input type="text" name="codigo-referencia">
					
					<label>Precio unitario</label>
					<input type="number" name="precio-unitario">
					
					<label>Descuento %</label>
					<input type="number" name="descuento" min="0" max="100">

					<label>Categoria</label>
					<input type="text" name="categoria">

					<label>Etiquetas</label>
					<input type="text" name="etiquetas">
					
					<label>Tamaños ó tallas</label>
					<input type="number" name="tamaño" min="1">

					<label>Color</label>
					<input type="text" name="color">

					<label>Cantidades</label>
					<input type="number" name="cantidades" min="1">

					<!-- Barra de aceptar registro o cancelar registro -->

					<div>
						<input type="reset" name="cancelar-registro" value="Cancelar">
						<input type="submit" name="crear-producto" value="Crear">
					</div>

				</form>
			</section>
		</section>
	@endsection