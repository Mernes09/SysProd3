<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


Route::get('/home','HomeController@index')->name('home');

//pedido
Route::get('/Pedido','PedidoController@index');
Route::get('/agregarPedido','PedidoController@create');
Route::post('/guardarpedido','PedidoController@store');

Route::delete('/borrarpedido/{id}','PedidoController@destroy');
Route::get('/editarpedido/{id}/edit','PedidoController@edit');
Route::patch('/editarpedido/{id}','PedidoController@update');


//produccion
Route::get('/OrdenProduccion','OrdenProduccionController@index');


//inventario
Route::get('/Inventario','InventarioController@index');
//producto
Route::get('/Productoagregar','ProductoController@index');
