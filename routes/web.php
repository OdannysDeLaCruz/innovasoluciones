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
Route::get('/productos/{id}-{nombre}', 'PrincipalController@showDetalles');
Route::get('/productos/{seccion?}', 'PrincipalController@showCategoria');


// RUTAS PARA USUARIOS
Route::get('/perfil/', function () {
    return view('users/perfil');
})->name('perfil');

Route::get('/perfil/compras', function () {
    return view('users/compras');
})->name('compras');

Route::get('/perfil/facturas', function () {
    return view('users/facturas');
})->name('facturas');


// RUTAS PARA PAGOS
Route::get('/verificacion', function () {
    return view('verificacion');
})->name('verificacion');

Route::post('/payment', 'PaymentController@payment')->name('payment');
