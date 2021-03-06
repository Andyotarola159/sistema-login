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

Route::resource('usuario','UsuarioController');
Route::resource('log','LogController');
Route::get('logout','LogController@index');
Route::resource('imagen','ImagenController');
Route::resource('video','VideoController');