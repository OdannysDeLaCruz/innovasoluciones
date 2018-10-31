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
				<h1 class="indicador_de_formulario">Datos del nuevo productos a crear. Tenga en cuenta que los campos con (*) son obligatorios.</h1>
				<form class="form_crear_producto" action="{{ route('createProductos') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}


			        @if ($errors->has('descripcion'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('descripcion') }}</strong>
	                    </span>
	                @endif
					<div class="form-group">
						<label class="form_titulos" for="descripcion">* Descripción de producto</label>
						<input type="number" id="descripcion" class="form-control" name="descripcion">				
					</div>

					<div class="form-group">
						<label class="form_titulos" for="imagen_principal">* Imagen principal</label>
						<input type="file" id="imagen_principal" name="imagen_principal">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="categoria">* Categoria</label>
						<select class="form-control" id="categoria" name="categoria">
							<option value="id_categoria">c1</option>
							<option value="id_categoria">c2</option>
							<option value="id_categoria">c3</option>
						</select>
					</div>

					<div class="form-group">
						<label class="form_titulos" for="tags">Etiquetas</label>
						<input type="text" id="tags" class="form-control" name="tags">
					</div>
					<div class="form-group">
						<label class="form_titulos" for="codigo-referencia">Código de referencia</label>
						<input type="text" class="form-control" name="codigo-referencia">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="precio">* Precio unitario</label>
						<input type="number" id="precio" class="form-control" name="precio-unitario">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="descuento">Descuento %</label>
						<input type="number" id="descuento" class="form-control" name="descuento" min="0" max="100">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="tallas">Tamaños ó tallas</label>
						<input type="text" id="tallas" class="form-control" name="tallas" min="1">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="colores">Colores</label>
						<input type="text" id="colores" class="form-control" name="colores">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="tiempo_entrega">Tiempo estimado de entrega</label>
						<input type="text" id="tiempo_entrega" class="form-control" name="tiempo_entrega">
					</div>

					<div class="form-group">
						<label class="form_titulos" for="cantidades">Cantidades disponibles <small>(Opcional)</small></label>
						<input type="number" id="cantidades" class="form-control" name="cantidades" min="1">
					</div>

					<section class="section_subir_imagenes">
						<h1 class="section_subir_imagenes_titulo">SUBIR IMAGENES DE REFERENCIAS</h1>
						<input type="file" class="form-control section_subir_imagenes_input" name="imgsReferencias">
						<span class="section_subir_imagenes_checkbox">
							<p>¿Imagenes de descripción?</p>
							<input type="checkbox" name="">							
						</span>
					</section>

					<!-- Barra de aceptar registro o cancelar registro -->

					<div class="form_botones_accion">
						<button type="reset" class="btn_cancelar">
							<i class="fa fa-close" aria-hidden="true"></i>
							CANCELAR
						</button>
						<button type="submit" class="btn_terminar">
							<i class="fa fa-check" aria-hidden="true"></i>
							TERMINAR
						</button>
					</div>

				</form>
			</section>
		</section>
	@endsection