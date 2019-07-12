<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@index')->name('home');

// RUTAS PARA PRODUCTOS
Route::get('/productos', 'PrincipalController@showProductos')->name('productos');

// Seleccinoador de pagina de descripcion, se mostrará la vista referencias (Donde esta el boton que lleva a la vista detalles_referencias (opción de comprar) ) ó mostrará directamente la vista detalles (donde esta la información del producto completa, incluida la opcion de comprar).
Route::get('/productos/{ref}-{descripcion}', 'PrincipalController@seleccionarDescripcion')->name('seleccionarDescripcion');

Route::get('/productos/{seccion?}', 'PrincipalController@showCategoriaProductos');

// Esta ruta mostrará la vista de opción de comprar de los productos que vengan de la vista referencias
Route::get('detalle-compra/{ref}-{descripcion}', 'PrincipalController@showDetallesCompra')->name('showDetallesCompra');

Route::get('/search/{tag?}', 'SearchProductsController@showProductosSearch')->name('productoTag');
Route::post('/searchtags', 'SearchProductsController@index')->name('searchtags');


// RUTAS PARA USUARIOS
Route::group(['namespace' => 'User', 'prefix' => 'perfil'], function(){

	Route::get('/', 'UserController@showPerfil')->name('perfil');

	Route::get('pedidos', 'UserController@showPedidos')->name('pedidos');

	Route::get('pedidos/{id?}', 'UserController@showPedidoDetalles')->name('compras');

	Route::get('facturas','UserController@showFacturas')->name('facturas');

	Route::get('facturas/{id?}','UserController@showFacturasDetalles')->name('detalle_factura');

	Route::get('facturas/descargar/{id?}','UserController@descargarFactura')->name('descargar_factura');
});


// RUTAS PARA CARRITO DE COMPRAS
Route::get('/cart', 'CartController@show')->name('showCart');

// Route::get('/cart/add/{id}-{descripcion}', 'CartController@add')->name('addItem');
Route::post('/cart/add/', 'CartController@add')->name('addItem');

Route::get('/cart/delete/{producto}', 'CartController@delete')->name('deleteItem');

Route::get('/cart/update/{producto}/{cantidad}', 'CartController@update')->name('updateItem');

// RUTAS PARA PAGOS
Route::get('/verificacion', 'VerificarPedidoController@verificar')->name('verificar');

Route::post('/verificacion/cambiar-direccion', 'VerificarPedidoController@cambiar_direccion_envio')->name('cambiar-direccion-envio');

Route::post('/verificarCodigo', 'VerificarPedidoController@verificarCodigo')->name('verificarCodigo');

Route::post('checkout/buying/payment/', 'PaymentController@payment')->name('payment');

Route::post('checkout/buying/payment/crearpedido', 'CrearPedidoController@crearPedido');

Route::get('/response', 'ConfirmationController@response');

Route::post('/confirmation', 'ConfirmationController@confirmation')->name('confirmation');

// RUTAS PARA AUTENTICACION DE USUARIOS
Auth::routes();

// RUTAS PARA ADMIN - PANEL DE ADMINISTRACION
Route::group(['middleware' => 'adminAuth', 'prefix' => 'admin'], function(){

	Route::get('/', 'AdminController@index')->name('admin');

	Route::get('/productos', 'AdminController@getProductos')->name('getProductos');

	Route::get('/productos/nuevo', 'AdminController@showCreateProductos')->name('showCreateProductos');
	
	Route::get('/productos/{producto_ref}', 'AdminController@getDetallesProducto')->name('getDetallesProducto');

	Route::post('/productos/{producto_ref}/actualizar', 'AdminController@actualizarProducto')->name('actualizarProducto');

	Route::get('/productos/eliminar/{id}', 'AdminController@eliminarProducto')->name('eliminarProducto');	
	
	Route::post('/productos/registrar', 'AdminController@createProductos')->name('createProductos');

	Route::get('/pedidos', 'AdminController@getPedidos')->name('getPedidos');

	Route::get('/clientes', 'AdminController@getClientes')->name('getClientes');

	Route::get('/codigos', 'AdminController@getCodigos')->name('getCodigos');

	Route::get('/secciones', 'AdminController@getSecciones')->name('getSecciones');

	Route::get('/usuarios', 'AdminController@getUsuarios')->name('getUsuarios');
});

// Ruta para prueba de datos de la pagina confirmation
Route::get('/data', function(){

	$file = fopen("data.txt", "r") or exit("Unable to open file!");
	//Output a line of the file until the end is reached
	while(!feof($file)) {
		echo fgets($file). "<br />";
	}
	fclose($file);
});