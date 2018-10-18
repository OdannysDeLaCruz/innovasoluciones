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

// Descripción del producto 
Route::get('/productos/{id}-{descripcion}', 'PrincipalController@seleccionarDescripcion')->name('seleccionarDescripcion');
// Detalle del producto y boton para comprar
Route::get('/productos/{id}-{descripcion}/detalle-compra', 'PrincipalController@showDetalles')->name('showDetalles');

Route::get('/productos/{seccion?}', 'PrincipalController@showCategoriaProductos');

Route::get('/search/{tag?}', 'SearchProductsController@showProductosTag')->name('productoTag');

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

Route::post('/verificarCodigo', 'VerificarPedidoController@verificarCodigo')->name('verificarCodigo');

Route::post('checkout/buying/payment', 'PaymentController@payment')->name('payment');

Route::get('/response', 'ConfirmationController@response');

Route::post('/confirmation', 'ConfirmationController@confirmation');

// RUTAS PARA AUTENTICACION DE USUARIOS
Auth::routes();

// RUTAS PARA ADMIN - PANEL DE ADMINISTRACION
Route::group(['middleware' => 'adminAuth', 'prefix' => 'admin'], function(){

	Route::get('/', 'AdminController@index')->name('admin');

	Route::get('/productos', 'AdminController@getProductos')->name('getProductos');
	
	Route::get('/productos/nuevo', 'AdminController@showCreateProductos')->name('showCreateProductos');
	
	Route::post('/productos/registrar', 'AdminController@createProductos')->name('createProductos');

	Route::get('/pedidos', 'AdminController@getPedidos')->name('getPedidos');

	Route::get('/clientes', 'AdminController@getClientes')->name('getClientes');

	Route::get('/codigos', 'AdminController@getCodigos')->name('getCodigos');

	Route::get('/secciones', 'AdminController@getSecciones')->name('getSecciones');

	Route::get('/usuarios', 'AdminController@getUsuarios')->name('getUsuarios');
});