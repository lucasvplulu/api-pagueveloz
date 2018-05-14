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


//HOME
Route::get('/', 'HomeController@index')->middleware('autoconfig')->name('home');

//EMITIR BOLETO
Route::post('create_bol/', 'HomeController@create')->middleware('autoconfig')->name('create_bol.criar');

//CONSULTAR
Route::get('consultar_bol/{id}', 'HomeController@consultar')->name('consultar_bol');

//DELETAR BOLETO
Route::post('delete_bol/', 'HomeController@delete')->name('delete_bol.delete');
