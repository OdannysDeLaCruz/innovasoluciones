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
Route::get('/productos', 'PrincipalController@showProductos');
Route::get('/productos/{id}-{descripcion}', 'PrincipalController@showDetalles');
Route::get('/productos/{seccion?}', 'PrincipalController@showCategoriaProductos');


// RUTAS PARA USUARIOS
Route::get('/perfil/', 'UserController@showPerfil')->name('perfil');

Route::get('/perfil/pedidos', 'UserController@showPedidos')->name('pedidos');

Route::get('/perfil/pedidos/{id?}', 'UserController@showPedidoDetalles')->name('compras');

Route::get('/perfil/facturas','UserController@showFacturas')->name('facturas');


// RUTAS PARA PAGOS
Route::get('/verificacion', function () {
    return view('verificacion');
})->name('verificacion');

Route::post('/payment', 'PaymentController@payment')->name('payment');


// RUTAS PARA AUTENTICACION DE USUARIOS
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
