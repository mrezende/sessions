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
    return view('welcome');
});

Route::get('/produtos', 'ProdutoController@index');
Route::get('/produtos/cria', 'ProdutoController@cria');

Route::post('/produtos', 'ProdutoController@armazena');

Route::get('/carrinho/exibe', 'CarrinhoController@exibe');
Route::get('/carrinho/adiciona/{produto}', 'CarrinhoController@adiciona');

Route::delete('/carrinho/remove/{produto}', 'CarrinhoController@remove');
