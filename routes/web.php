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

Route::get('/', function () {
    return view('index');
});

Route::get('/produtos'               , 'ControladorProduto@indexview');
Route::get('/produtos'               , 'ControladorProduto@indexteste');
Route::post('/produtos'              , 'ControladorProduto@store');
Route::get('/produtos/apagar/{id}'   , 'ControladorProduto@destroy');
Route::get('/produtos/editar/{id}'   , 'ControladorProduto@edit');
Route::post('/produtos/{id}'         , 'ControladorProduto@update');
Route::get('/produtos/search'        , 'ControladorProduto@search');


Route::get('/categorias'             , 'ControladorCategoria@index');
Route::get('/categorias/novo'        , 'ControladorCategoria@create');
Route::post('/categorias'            , 'ControladorCategoria@store');
Route::get('/categorias/apagar/{id}' , 'ControladorCategoria@destroy');
Route::get('/categorias/editar/{id}' , 'ControladorCategoria@edit');
Route::post('/categorias/{id}'       , 'ControladorCategoria@update');
Route::get('/categorias/search'      , 'ControladorCategoria@search');
Route::get('/categorias/{id}'        , 'ControladorCategoria@show');

Route::get('/clientes/novo'          , 'ControladorCliente@create');  
Route::get('/clientes'               , 'ControladorCliente@index');  
Route::post('/cliente'               , 'ControladorCliente@store'); 
Route::get('/clientes/apagar/{id}'   , 'ControladorCliente@destroy');
Route::get('/clientes/editar/{id}'   , 'ControladorCliente@edit');
Route::post('/clientes/{id}'         , 'ControladorCliente@update');
Route::get('/clientes/search'        , 'ControladorCliente@search');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
