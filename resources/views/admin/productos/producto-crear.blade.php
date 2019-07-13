@extends('admin/layout')
	@section('title') 
		Productos de Innova
	@endsection
	@section('productos') active @endsection
	@section('contenido')
		
		<section class="col-12 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">productos / crear producto</h1>
			</header>
			
			<section class="contenedor_tabla">
				<h1 class="indicador_de_formulario">Datos del nuevo productos a crear. Tenga en cuenta que los campos con (<span class="form_titulos_required">*</span>) son obligatorios.</h1>
				<form class="form_crear_producto" id="form_crear_producto" action="{{ route('createProductos') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}

	                <!-- Nombre -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_nombre"> <span class="form_titulos_required">*</span> Nombre del producto</label>
							<input type="text" id="producto_nombre" class="form-control" name="producto_nombre" value="{{ old('producto_nombre') }}" required>	
						</div>
		                @if ($errors->has('producto_nombre'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_nombre') }}</p>
		                    </span>
		                @endif					
					</div>					
	                <!-- Descripcion -->
					<div class="form-group">
						<div class="form-group-items descripcion_editor">
							<label class="form_titulos" for="producto_descripcion"> <span class="form_titulos_required"></span> Descripción del producto</label>
							<textarea id="producto_descripcion" name="producto_descripcion" placeholder="Escribe la increible descripcion de este producto"></textarea>		
						</div>
						@if ($errors->has('producto_descripcion'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_descripcion') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Precio -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_precio"> <span class="form_titulos_required">*</span> Precio del producto</label>
							<input type="number" id="producto_precio" class="form-control" name="producto_precio" placeholder="Sin puntos ni comas, ej: 10000" value="{{ old('producto_precio') }}" required>
			            </div>
						@if ($errors->has('producto_precio'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_precio') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Cantidad -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_cantidad"> <span class="form_titulos_required">*</span> Cantidades disponibles</label>
							<input type="number" min="1" id="producto_cantidad" class="form-control" name="producto_cantidad" value="{{ old('producto_cantidad') }}" required>
						</div>
						@if ($errors->has('producto_cantidad'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_cantidad') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Referencia -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_ref"> <span class="form_titulos_required">*</span> Referencia del producto</label>
							<input type="text" id="producto_ref" class="form-control producto_ref" name="producto_ref" placeholder="Este código debe ser unico para cada producto" value="{{ old('producto_ref') }}" required>
						</div>
						@if ($errors->has('producto_ref'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_ref') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Categoria -->
					<div class="form-group">
						<div class="form-group-items">	
							<label class="form_titulos" for="producto_categoria"><span class="form_titulos_required">*</span> Categorias del producto</label>
							<select class="form-control producto_categoria" id="producto_categoria" name="producto_categoria" value="{{ old('producto_categoria') }}" required>
								<option>Escoge una categoria</option>
								@if(isset($categorias))
									@foreach($categorias as $categoria)
										<option value="{{ $categoria->id }}">{{ $categoria->categoria_nombre }}</option>
									@endforeach
								@endif
							</select>	
						</div>
						@if ($errors->has('producto_categoria'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_categoria') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Etiquetas -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_tags"> <span class="form_titulos_required">*</span> Etiquetas del producto</label>
							<input type="text" id="producto_tags" class="form-control" name="producto_tags" placeholder="Separados por comas (zapatos, ropa, celular)" value="{{ old('producto_tags') }}" required>
						</div>
						@if ($errors->has('producto_tags'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_tags') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Imagen principal -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="Producto_imagen"> <span class="form_titulos_required">*</span> Imagen principal</label>
							<input type="file" class="form-control Producto_imagen" id="producto_imagen" name="producto_imagen" value="{{ old('producto_imagen') }}" required>
						</div>
						@if ($errors->has('producto_imagen'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_imagen') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Promocion -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_promocion">Agregar promoción</label>
							<select class="form-control producto_promocion" id="producto_promocion" name="producto_promocion" value="{{ old('producto_promocion') }}">
								<option value="0">Asigna una promoción al producto </option>
								@if(isset($promociones))
									@foreach($promociones as $promocione)
										<option value="{{ $promocione->id }}">{{ $promocione->promo_nombre }} ( {{ $promocione->promo_tipo }} )  ( {{ $promocione->promo_costo }} )</option>
									@endforeach
								@endif
							</select>
						</div>
						@if ($errors->has('producto_promocion'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_promocion') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Talla -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_tallas">Tamaños ó tallas disponibles</label>
							<input type="text" id="producto_tallas" class="form-control" name="producto_tallas" min="1" placeholder="2cm x 2cm, 28, 30, M, S, L...etc" value="{{ old('producto_tallas') }}">
						</div>
						@if ($errors->has('producto_tallas'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_tallas') }}</p>
		                    </span>
		                @endif
					</div>
					<!-- Colores -->
					<div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_colores">Colores disponibles</label>
							<input type="text" id="producto_colores" class="form-control" name="producto_colores" placeholder="Separados por comas (verdes, rojos, azul)" value="{{ old('producto_colores') }}">
						</div>
						@if ($errors->has('producto_colores'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_colores') }}</p>
		                    </span>
		                @endif
					</div>

					<!-- imagenes de referencias -->
					<section class="form-group section_subir_imagenes">
						<h1 class="section_subir_imagenes_titulo">SUBIR IMAGENES COMPLEMENTARIAS <small>(Max 4)</small></h1>
						<input type="file" class="form-control section_subir_imagenes_input" name="producto_imgs_referencia[]" multiple>

						<!-- <span class="invalid-feedback" role="alert">
		                    <p>Mensaje de error</p>
		                </span> -->

						@if ($errors)
							@foreach($errors as $error)
								<span class="invalid-feedback" role="alert">
		                    		<p>Mensaje de error</p>
		                		</span>
							@endforeach
		                   <!--  <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_imgs_referencia.0') }}</p>
		                    </span> -->
		                @endif
		               <!--  @if ($errors->has('producto_imgs_referencia'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_imgs_referencia') }}</p>
		                    </span>
		                @endif -->
						<h1 class="section_subir_imagenes_titulo mt-4">SUBIR VIDEOS COMPLEMENTARIAS</h1>
						<input type="text" class="form-control section_subir_imagenes_input" name="producto_videos_referencia" placeholder="Separe cada código de video con una coma ( , )">

						@if ($errors->has('producto_videos_referencia'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_videos_referencia') }}</p>
		                    </span>
		                @endif
						<span class="section_subir_imagenes_checkbox">
							<p>¿Imagenes de descripción?</p>
							<input opcion="{{ old('producto_tieneImgDescripcion') }}" type="checkbox" name="producto_tieneImgDescripcion">						
						</span>
					</section>

					<!-- Barra de aceptar registro o cancelar registro -->

					<div class="form_botones_accion">
						<button type="reset" class="boton-defaul-rojo"> Cancelar </button>
						<button type="submit" class="boton-defaul-azul" id="btn-crear-producto"> Guardar </button>
					</div>
				</form>
			</section>
		</section>
	@endsection