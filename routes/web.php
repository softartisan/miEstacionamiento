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
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/crud', 'CrudController@index');
Route::get('/crud/{id}/edit', 'CrudController@edit');
Route::patch('/crud/{id}', 'CrudController@update');
Route::get('/crud/{id}/delete', 'CrudController@destroy');


Route::get('/arrendar', 'ArrendarController@arrendar');
Route::post('/arrendar/busqueda', 'ArrendarController@busqueda');
Route::get('/arrendar/{estacionamiento}', 'ArrendarController@show');

