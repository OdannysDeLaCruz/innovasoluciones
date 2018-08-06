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

Route::get('/', 'PrincipalController@index');

// RUTAS PARA PRODUCTOS
Route::get('/productos', 'PrincipalController@showProductos')->name('productos');

Route::get('/productos/{id}-{descripcion}', 'PrincipalController@showDetalles')->name('showDetalles');

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

Route::get('/cart/add/{id}-{descripcion}', 'CartController@add')->name('addItem');

Route::get('/cart/delete/{producto}', 'CartController@delete')->name('deleteItem');

Route::get('/cart/update/{producto}/{cantidad}', 'CartController@update')->name('updateItem');

// RUTAS PARA PAGOS
Route::get('/verificacion', 'VerificarPedidoController@verificar')->name('verificar');

Route::post('/verificarCodigo', 'VerificarPedidoController@verificarCodigo')->name('verificarCodigo');

Route::post('/payment', 'PaymentController@payment')->name('payment');


// RUTAS PARA AUTENTICACION DE USUARIOS
Auth::routes();

// 	RUTAS PARA ADMIN - PANEL DE ADMINISTRACION

Route::get('/admin', function() {
	return view('admin/home');
})->name('admin');