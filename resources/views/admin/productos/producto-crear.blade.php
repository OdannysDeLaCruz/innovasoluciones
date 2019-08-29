@extends('admin/layout')
	@section('script-local') 
		<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
	@endsection
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
				<form class="form_crear_producto" id="form_crear_producto" action="{{ route('createProducto') }}" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}


					<!-- Información basica del producto -->
					<section class="form-group">
						<h1 class="form-group-titulo">Información básica del producto</h1>
						<div class="form-group-blocks row">

							<!-- Nombre -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="nombre">
									<span class="form_titulos_required">*</span>Nombre del producto
								</label>

								<input autofocus type="text" id="nombre" class="form-control" name="nombre" value="{{ old('nombre') }}" required>

								@if ($errors->has('nombre'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('nombre') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Precio -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="precio">
									<span class="form_titulos_required">*</span>Precio
								</label>

								<input type="text" id="precio" class="form-control" name="precio" value="{{ old('precio') }}" required>
								<span class="precio-preview">
									<span>COP$ </span><span id="precioPreview"></span>
								</span>

								@if ($errors->has('precio'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('precio') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Cantidad -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="cantidad">
									<span class="form_titulos_required">*</span>Cantidad
								</label>

								<input type="number" min="1" id="cantidad" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required>

								@if ($errors->has('cantidad'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('cantidad') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Categoria -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="categoria">
									<span class="form_titulos_required">*</span>Categoria
								</label>

								<select class="form-control" id="categoria" name="categoria" value="{{ old('categoria') }}" required>
									<option>Escoge una categoria</option>
									@if(isset($categorias))
										@foreach($categorias as $categoria)
											@if(old('categorias') == $categoria->id )
												<option value="{{ $categoria->id }}" selected>{{ $categoria->categoria_nombre }}</option>
											@else
												<option value="{{ $categoria->id }}">{{ $categoria->categoria_nombre }}</option>
											@endif
										@endforeach
									@endif
								</select>

								@if ($errors->has('categoria'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('categoria') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Descripción -->
							<div class="form-group-blocks-item col-12">
								<label class="form-group-subtitulo">
									<span class="form_titulos_required">*</span>Descripción del producto
								</label>
								<textarea name="descripcion">{{ old('descripcion') }}</textarea>
							</div>
						</div>						
					</section>

					<!-- Detalles del producto -->
					<section class="form-group">
						<h1 class="form-group-titulo">Detalles del producto</h1>
						<div class="form-group-blocks row">

							<!-- Tallas -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="tallas">
									<span class="form_titulos_required"></span>Tallas
								</label>

								<input autofocus type="text" id="tallas" class="form-control" name="tallas" value="{{ old('tallas') }}">

								@if ($errors->has('tallas'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('tallas') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Colores -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="colores">
									<span class="form_titulos_required"></span>Colores
								</label>

								<input type="text" id="colores" class="form-control" name="colores" value="{{ old('colores') }}">

								@if ($errors->has('colores'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('colores') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Proveedor -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="proveedor">
									<span class="form_titulos_required"></span>Proveedor
								</label>

				                <select class="form-control" id="proveedor" name="proveedor" value="{{ old('proveedor') }}">
									<option>Escoge un proveedor</option>
									@if(isset($proveedores))
										@foreach($proveedores as $proveedor)
											@if(old('proveedor') == $proveedor->id )
												<option value="{{ $proveedor->id }}" selected>{{ $proveedor->proveedor_razon_social }}</option>
											@else
												<option value="{{ $proveedor->id }}">{{ $proveedor->proveedor_razon_social }}</option>
											@endif
										@endforeach
									@endif
								</select>

								@if ($errors->has('proveedor'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('proveedor') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Marca -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="marca">
									<span class="form_titulos_required"></span>Marca
								</label>

				                <select class="form-control" id="marca" name="marca" value="{{ old('marca') }}">
									<option>Escoge un marca</option>
									@if(isset($marcas))
										@foreach($marcas as $marca)
											@if(old('marca') == $marca->id )
												<option value="{{ $marca->id }}" selected>{{ $marca->marca_nombre }}</option>
											@else
												<option value="{{ $marca->id }}">{{ $marca->marca_nombre }}</option>
											@endif
										@endforeach
									@endif
								</select>

								@if ($errors->has('marca'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('marca') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Etiquetas -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="tags">
									<span class="form_titulos_required">*</span>Etiquetas
								</label> 

								<div class="tags-preview" id="tags-preview"></div>

								<input type="text" id="tagsInput" class="form-control tags-input" name="tags" value="{{ old('tags') }}" required>

								<input type="hidden" id="tags" class="form-control" name="tags" value="{{ old('tags') }}" required>

								@if ($errors->has('tags'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('tags') }}</p>
				                    </span>
				                @endif
							</div>
						</div>						
					</section>

					<!-- Multimedia -->
					<section class="form-group">
						<h1 class="form-group-titulo">Información Multimedia del producto</h1>
						<div class="form-group-blocks row">

							<!-- Imagen de Portada -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="portada">
									<span class="form_titulos_required">*</span>Imagen de portada
								</label>

								<input type="file" class="form-control" id="portada" name="portada" value="{{ old('portada') }}" required>

								@if ($errors->has('portada'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('portada') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Imagenes complementarias -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="imagenes">
									<span class="form_titulos_required"></span>Imagenes complementarias
								</label>

								<input type="file" class="form-control" name="imagenes[]" multiple>
								
								@if ($errors->has('imagenes'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('imagenes') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Videos de complementarios -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="videos">
									<span class="form_titulos_required"></span>Videos complementarios <br> <small>Insertar código de YouTube</small>
								</label>

								<textarea rows="5" id="videos" class="form-control" name="videos" placeholder="Separados por comas ( , )">{{ old('videos') }}</textarea>

								@if ($errors->has('videos'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('videos') }}</p>
				                    </span>
				                @endif
							</div>

							<!-- Checkbox descripcion por imagen -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<span class="section_subir_imagenes_checkbox">
									<label class="m-0">¿Descripción por imagen?</label>
									<input opcion="{{ old('descripcion_por_imagen') }}" class="checkbox" type="checkbox" name="descripcion_por_imagen">
								</span>
							</div>
						</div>
					</section>

					<!-- Promociones -->
					<section class="form-group">
						<h1 class="form-group-titulo">Promociones del producto</h1>
						<div class="form-group-blocks row">

							<!-- Promociones -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="promocion">
									<span class="form_titulos_required"></span>Agregar promoción
								</label>
				                <select class="form-control" id="promocion" name="promocion" value="{{ old('promocion') }}">
									<option>Escoge una promoción</option>
									@if(isset($promociones))
										@foreach($promociones as $promocion)
											@if(old('promocion') == $promocion->id )
												<option value="{{ $promocion->id }}" selected>
													{{ $promocion->promo_nombre . '($texto)' }}
													(
														@if($promocion->promo_tipo == "%")
															{{ $promocion->promo_costo . '%' }}
														@elseif($promocion->promo_tipo == "$")
															{{ 'COP$ '. number_format($promocion->promo_costo, 0, '', '.') }}
														@else
															{{ '2x1' }}
														@endif
													)
												</option>
											@endif
												<option value="{{ $promocion->id }}">
													{{ $promocion->promo_nombre }} 
													(
														@if($promocion->promo_tipo == "%")
															{{ $promocion->promo_costo . '%' }}
														@elseif($promocion->promo_tipo == "$")
															{{ 'COP$ '. number_format($promocion->promo_costo, 0, '', '.') }}
														@else
															{{ '2x1' }}
														@endif
													)
												</option>
										@endforeach
									@endif
								</select>
								@if ($errors->has('promocion'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('promocion') }}</p>
				                    </span>
				                @endif
							</div>
							@if ($errors->has('producto_promocion'))
			                    <span class="invalid-feedback" role="alert">
			                        <p>{{ $errors->first('producto_promocion') }}</p>
			                    </span>
			                @endif							
						</div>						
					</section>







	                <!-- Nombre -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_nombre"> <span class="form_titulos_required">*</span> Nombre del producto</label>
							<input autofocus type="text" id="producto_nombre" class="form-control" name="producto_nombre" value="{{ old('producto_nombre') }}" required>	
						</div>
		                @if ($errors->has('producto_nombre'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_nombre') }}</p>
		                    </span>
		                @endif					
					</div> -->					
	                <!-- Descripcion -->
					<!-- <div class="form-group"> -->
						<!-- <div class="form-group-items descripcion_editor">
							<label class="form_titulos" for="producto_descripcion"> <span class="form_titulos_required"></span> Descripción del producto</label> -->
							<!-- <textarea id="producto_descripcion" name="producto_descripcion" placeholder="Escribe la increible descripcion de este producto"></textarea> -->
							<!-- <textarea name="producto_descripcion" placeholder="Escribe la increible descripcion de este producto">{{ old('producto_descripcion') }}</textarea>
						</div>
						@if ($errors->has('producto_descripcion'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_descripcion') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Precio -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_precio"> <span class="form_titulos_required">*</span> Precio del producto</label>
							<input type="number" id="producto_precio" class="form-control" name="producto_precio" placeholder="Sin puntos ni comas, ej: 10000" value="{{ old('producto_precio') }}" required>
			            </div>
						@if ($errors->has('producto_precio'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_precio') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Cantidad -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_cantidad"> <span class="form_titulos_required">*</span> Cantidades disponibles</label>
							<input type="number" min="1" id="producto_cantidad" class="form-control" name="producto_cantidad" value="{{ old('producto_cantidad') }}" required>
						</div>
						@if ($errors->has('producto_cantidad'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_cantidad') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Referencia -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_ref"> <span class="form_titulos_required">*</span> Referencia del producto</label>
							<input type="text" id="producto_ref" class="form-control producto_ref" name="producto_ref" placeholder="Este código debe ser unico para cada producto" value="{{ old('producto_ref') }}" required>
						</div>
						@if ($errors->has('producto_ref'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_ref') }}</p>
		                    </span>
		                @endif
					</div> --> 
					<!-- Categoria -->
					<!-- <div class="form-group">
						<div class="form-group-items">	
							<label class="form_titulos" for="producto_categoria"><span class="form_titulos_required">*</span> Categorias del producto</label>
							<select class="form-control producto_categoria" id="producto_categoria" name="producto_categoria" value="{{ old('producto_categoria') }}" required>
								<option>Escoge una categoria</option>
								@if(isset($categorias))
									@foreach($categorias as $categoria)
										@if(old('producto_categoria') == $categoria->id )
											<option value="{{ $categoria->id }}" selected >{{ $categoria->id }} {{ $categoria->categoria_nombre }}</option>
										@else
											<option value="{{ $categoria->id }}" >{{ $categoria->id }} {{ $categoria->categoria_nombre }}</option>
										@endif
									@endforeach
								@endif
							</select>	
						</div>
						@if ($errors->has('producto_categoria'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_categoria') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Etiquetas -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_tags"> <span class="form_titulos_required">*</span> Etiquetas del producto</label>
							<input type="text" id="producto_tags" class="form-control" name="producto_tags" placeholder="Separados por comas (zapatos, ropa, celular)" value="{{ old('producto_tags') }}" required>
						</div>
						@if ($errors->has('producto_tags'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_tags') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Imagen principal -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="Producto_imagen"> <span class="form_titulos_required">*</span> Imagen principal</label>
							<input type="file" class="form-control Producto_imagen" id="producto_imagen" name="producto_imagen" value="{{ old('producto_imagen') }}" >
						</div>
						@if ($errors->has('producto_imagen'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_imagen') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Promocion -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_promocion">Agregar promoción</label>
							<select class="form-control producto_promocion" id="producto_promocion" name="producto_promocion" value="{{ old('producto_promocion') }}">
								<option value="0">Asigna una promoción al producto </option>
								@if(isset($promociones))
									@foreach($promociones as $promocione)
										@if(old('producto_promocion') == $promocione->id )
											<option value="{{ $promocione->id }}" selected>{{ $promocione->promo_nombre }} ( {{ $promocione->promo_tipo }} )  ( {{ $promocione->promo_costo }} )</option>
										@endif
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
					</div> -->
					<!-- Talla -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_tallas">Tamaños ó tallas disponibles</label>
							<input type="text" id="producto_tallas" class="form-control" name="producto_tallas" min="1" placeholder="2cm x 2cm, 28, 30, M, S, L...etc" value="{{ old('producto_tallas') }}">
						</div>
						@if ($errors->has('producto_tallas'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_tallas') }}</p>
		                    </span>
		                @endif
					</div> -->
					<!-- Colores -->
					<!-- <div class="form-group">
						<div class="form-group-items">
							<label class="form_titulos" for="producto_colores">Colores disponibles</label>
							<input type="text" id="producto_colores" class="form-control" name="producto_colores" placeholder="Separados por comas (verdes, rojos, azul)" value="{{ old('producto_colores') }}">
						</div>
						@if ($errors->has('producto_colores'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_colores') }}</p>
		                    </span>
		                @endif
					</div> -->

					<!-- imagenes de referencias -->
					<!-- <section class="form-group section_subir_imagenes">
						<h1 class="section_subir_imagenes_titulo">SUBIR IMAGENES COMPLEMENTARIAS <small>(Max 4)</small></h1>
						<input type="file" class="form-control section_subir_imagenes_input" name="producto_imgs_referencia[]" multiple>
 -->
						<!-- <span class="invalid-feedback" role="alert">
		                    <p>Mensaje de error</p>
		                </span> -->

						<!-- @if ($errors)
							@foreach($errors as $error)
								<span class="invalid-feedback" role="alert">
		                    		<p>Mensaje de error</p>
		                		</span>
							@endforeach -->
		                   <!--  <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_imgs_referencia.0') }}</p>
		                    </span> -->
		                <!-- @endif -->
		               <!--  @if ($errors->has('producto_imgs_referencia'))
		                    <span class="invalid-feedback" role="alert">
		                        <p>{{ $errors->first('producto_imgs_referencia') }}</p>
		                    </span>
		                @endif -->
						<!-- <h1 class="section_subir_imagenes_titulo mt-4">SUBIR VIDEOS COMPLEMENTARIAS</h1>
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
					</section> -->

					<!-- Barra de aceptar registro o cancelar registro -->

					<div class="form_botones_accion">
						<button type="reset" class="boton-defaul-rojo"> Cancelar </button>
						<button type="submit" class="boton-defaul-azul" id="btn-crear-producto"> Guardar </button>
					</div>
				</form>
			</section>
		</section>
	@endsection