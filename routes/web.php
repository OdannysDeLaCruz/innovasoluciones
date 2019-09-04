<?php

Route::get('/', 'PrincipalController@index')->name('home');

// RUTAS PARA PRODUCTOS
Route::get('/productos', 'PrincipalController@showProductos')->name('productos');

// Seleccinoador de pagina de descripcion, se mostrará la vista referencias (Donde esta el boton que lleva a la vista detalles_referencias (opción de comprar) ) ó mostrará directamente la vista detalles (donde esta la información del producto completa, incluida la opcion de comprar).
Route::get('/productos/{ref}-{descripcion}', 'PrincipalController@seleccionarDescripcion')->name('descripcion');
Route::get('/productos/{seccion?}', 'PrincipalController@showCategoriaProductos')->name('categorias');

// Esta ruta mostrará la vista de opción de comprar de los productos que vengan de la vista referencias
Route::get('detalle-compra/{ref}-{descripcion}', 'PrincipalController@showDetallesCompra')->name('showDetallesCompra');

Route::get('/search/{tag?}', 'SearchProductsController@showProductosSearch')->name('productoTag');
Route::post('/searchtags', 'SearchProductsController@index')->name('searchtags');

// RUTAS PARA USUARIOS
Route::group(['namespace' => 'User', 'prefix' => 'perfil'], function() {
	Route::get('/', 'UserController@showPerfil')->name('perfil');
	Route::get('pedidos', 'UserController@showPedidos')->name('pedidos');
	Route::get('pedidos/{id?}', 'UserController@showPedidoDetalles')->name('compras');

	// RUTAS PARA FACTURAS DE USUARIOS
	Route::get('facturas','FacturaController@index')->name('facturas');
	Route::get('facturas/{id?}','FacturaController@show')->name('detalle_factura');
	Route::get('facturas/descargar/{id?}','FacturaController@download')->name('descargar_factura');
});


// RUTAS PARA CARRITO DE COMPRAS
Route::get('/cart', 'CartController@show')->name('showCart');
Route::post('/cart/add/', 'CartController@add')->name('addItem');
Route::get('/cart/delete/{producto}', 'CartController@delete')->name('deleteItem');
Route::get('/cart/update/{producto}/{cantidad?}', 'CartController@update')->name('updateItem');

// RUTAS PARA VERIFICACION DEL PEDIDO
Route::get('/verificacion', 'VerificarPedidoController@verificar')->name('verificar');
Route::post('/verificacion/cambiar-direccion', 'VerificarPedidoController@cambiar_direccion_envio')->name('cambiar-direccion-envio');
Route::post('/verificarCodigo', 'VerificarPedidoController@verificarCodigo')->name('verificarCodigo');
Route::get('checkout/buying/payment/', 'PaymentController@payment')->name('payment');
// Ruta para crear pedido con payu
Route::post('checkout/buying/payment/crear-pedido-payu', 'CrearPedidoPayuController@index')->name('crear-pedido-payu');

// RUTA PARA CONFIRMACION Y RESPUESTA DE PAYU
Route::get('/response', 'ConfirmationController@response');
Route::post('/confirmation', 'ConfirmationController@confirmation')->name('confirmation');

// RUTAS PARA DIRECCIONES
Route::post('/agregar-direccion', 'DireccionController@crear')->name('agregar-direccion');
Route::post('/establecer-direccion-defecto', 'DireccionController@establecerDireccionDefecto')->name('establecer-direccion-defecto');
Route::post('/eliminar-direccion', 'DireccionController@eliminar')->name('eliminar-direccion');

// RUTAS PARA AUTENTICACION DE USUARIOS
Auth::routes();

// RUTAS PARA ADMIN - PANEL DE ADMINISTRACION
Route::group(['middleware' => 'adminAuth', 'prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@index')->name('admin');

	// PRODUCTOS
	Route::get('/productos', 'ProductoController@index')->name('getProducts');
	Route::get('/productos/crear', 'ProductoController@create')->name('createProduct');	
	Route::post('/productos/registrar', 'ProductoController@store')->name('storeProduct');
	Route::get('/productos/{producto_ref}', 'ProductoController@show')->name('showProduct');
	Route::post('/productos/{producto_ref}/actualizar', 'ProductoController@update')->name('updateProduct');
	Route::get('/productos/eliminar/{id}', 'ProductoController@destroy')->name('destroyProduct');	



	Route::get('/pedidos', 'AdminController@getPedidos')->name('getPedidos');
	Route::get('/clientes', 'AdminController@getClientes')->name('getClientes');
	Route::get('/codigos', 'AdminController@getCodigos')->name('getCodigos');
	Route::get('/secciones', 'AdminController@getSecciones')->name('getSecciones');
	Route::get('/categorias', 'AdminController@getCategorias')->name('getCategorias');
	Route::get('/usuarios', 'AdminController@getUsuarios')->name('getUsuarios');
});

// RUTA PARA PAISES Y ESTADOS
Route::post('/paises', 'PaisEstadoController@getPaises');
Route::post('/estados', 'PaisEstadoController@getEstados');

// RUTAS PARA PRUEBAS
Route::get('/data', function() {

	$file = fopen("data.txt", "r") or exit("Unable to open file!");
	//Output a line of the file until the end is reached
	while(!feof($file)) {
		echo fgets($file). "<br />";
	}
	fclose($file);
});
Route::get('ver-facturas', function() {
	return view('users.facturas.detalle');
});
Route::get('ver-email',function() {
	// return view('emails.confirmacion_pedido');
	return (new App\Mail\ConfirmacionPedidoRealizado())->render();
});
Route::post('/prueba-editor', 'AdminController@pruebaEditor')->name('prueba-editor');