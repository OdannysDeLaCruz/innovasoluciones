@extends('admin/layout')
	@section('script-local') 
		<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
	@endsection
	@section('title') 
		Crear nuevo producto
	@endsection
	@section('productos') active @endsection
	@section('contenido')
		
		<section class="col-12 col-md-10 contenido_principal">
			<header class="encabezado_principal">
				<h1 class="titulo_principal">productos / crear producto</h1>
			</header>
			
			<section class="contenedor_tabla">
				<form class="form_crear_producto" id="form_crear_producto" action="{{ route('storeProduct') }}" method="post" enctype="multipart/form-data">
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

								<input autofocus type="text" id="nombre" class="form-control" name="producto_nombre" value="{{ old('producto_nombre') }}" >

								@if ($errors->has('producto_nombre'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('producto_nombre') }}</p>
				                    </span>
				                @endif
							</div>
							<!-- Precio -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="precio">
									<span class="form_titulos_required">*</span>Precio
									<span class="precio-preview">
										<span>COP$ </span><span id="precioPreview"></span>
									</span>
								</label>

								<input type="text" id="precio" class="form-control" name="precio" value="{{ old('precio') }}">
								<small class="text-muted">Este precio debe tener impuestos incluidos</small>

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

								<input type="number" min="1" id="cantidad" class="form-control" name="cantidad" value="{{ old('cantidad') }}" >

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

								<select class="form-control" id="categoria" name="categoria" value="{{ old('categoria') }}" >
									@if(isset($categorias))
										<option>Escoge una categoria</option>
										@foreach($categorias as $categoria)
											@if(old('categorias') == $categoria->id )
												<option value="{{ $categoria->id }}" selected>{{ $categoria->categoria_nombre }}</option>
											@else
												<option value="{{ $categoria->id }}">{{ $categoria->categoria_nombre }}</option>
											@endif
										@endforeach
									@else
										<option></option>
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
									<span class="form_titulos_required"></span>Tallas <small class="text-muted">(separe las tallas ó tamaños con una " , ")</small>
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
									<span class="form_titulos_required"></span>Colores <small class="text-muted">(separados por " , ")</small>
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
									<option value="0">Asigna un proveedor</option>
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
									<option value="0">Asigna una marca</option>
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
									<span class="form_titulos_required">*</span>Etiquetas <small class="text-muted">(presione tecla space para confirmar, toca las etiquetas para quitarlas)</small>
								</label> 

								<div class="tags-preview" id="tags-preview"></div>

								<input type="text" id="tagsInput" class="form-control tags-input" name="tags" value="{{ old('tags') }}" >

								<input type="hidden" id="tags" class="form-control" name="etiquetas" value="{{ old('etiquetas') }}" required>

								@if ($errors->has('etiquetas'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('etiquetas') }}</p>
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

								<input type="file" class="form-control" id="portada" name="portada" value="{{ old('portada') }}" >

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
						
								<label class="form-group-subtitulo descripcion_por_imagen" for="img_descrip">
									<span class="form_titulos_required"></span>¿Descripción por imagen?
								</label>

								@if( old('descripcion_por_imagen') == 'on' )
									<input type="checkbox" id="img_descrip" class="checkbox" name="descripcion_por_imagen" checked>
								@else
									<input type="checkbox" id="img_descrip" class="checkbox" name="descripcion_por_imagen">
								@endif
							</div>
						</div>
					</section>

					<!-- Promociones -->
					<section class="form-group">
						<h1 class="form-group-titulo">Impuestos, promociones y agregados</h1>
						<div class="form-group-blocks row">

							<!-- Promociones -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="promocion">
									<span class="form_titulos_required"></span>Agregar promoción
								</label>
				                <select class="form-control" id="promocion" name="promocion" value="{{ old('promocion') }}">
				                	<option value="0">Escoge una promoción</option>
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

							<!-- Costo de envio -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="costo_envio">
									<span class="form_titulos_required"></span>Costo de envío 
									<span class="costo_envio-preview">
										<span>COP$ </span>
										<span id="costo_envioPreview"></span>
									</span>
								</label>

								<input type="text" id="costo_envio" class="form-control" name="costo_envio" value="{{ old('costo_envio') }}" >				

								@if ($errors->has('costo_envio'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('costo_envio') }}</p>
				                    </span>
				                @endif
							</div>

							<!-- Ganancias -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo" for="ganancias">
									<span class="form_titulos_required"></span>Ganancias en %
								</label>	

								<select class="form-control" id="ganancias" name="ganancias" value="{{ old('ganancias') }}">
									@foreach($ganancias as $key => $ganancia)
										@if(old('ganancias') == $key)
											<option value="{{ $key }}" selected>{{ $ganancia }}</option>
										@else
											<option value="{{ $key }}">{{ $ganancia }}</option>
										@endif
									@endforeach
								</select>

								@if ($errors->has('ganancias'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('ganancias') }}</p>
				                    </span>
				                @endif
							</div>


							<!-- Iva -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo iva" for="iva">
									<span class="form_titulos_required"></span>Agregar impuesto IVA del 19%
								</label>

								@if( old('iva') == 'on' )
									<input type="checkbox" id="iva" class="checkbox-iva" name="iva" checked>
								@else
									<input type="checkbox" id="iva" class="checkbox-iva" name="iva">
								@endif


								@if ($errors->has('iva'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('iva') }}</p>
				                    </span>
				                @endif
							</div>

							<!-- Payu -->
							<div class="form-group-blocks-item col-12 col-sm-6">
								<label class="form-group-subtitulo payu" for="payu">
									<span class="form_titulos_required"></span>Agregar comisión Payu 3.49% + 900
								</label>

								@if( old('payu') == 'on' )
									<input type="checkbox" id="payu" class="checkbox-payu" name="payu" checked>
								@else
									<input type="checkbox" id="payu" class="checkbox-payu" name="payu">
								@endif


								@if ($errors->has('payu'))
				                    <span class="invalid-feedback" role="alert">
				                        <p>{{ $errors->first('payu') }}</p>
				                    </span>
				                @endif
							</div>

							
													
						</div>						
					</section>

					<!-- Barra de aceptar registro o cancelar registro -->

					<div class="form-group form_botones_accion">
						<button type="submit" class="boton-defaul-verde" id="btn-crear-producto"> Crear producto </button>
					</div>
				</form>
			</section>
		</section>
	@endsection