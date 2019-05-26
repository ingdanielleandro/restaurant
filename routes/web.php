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

// Route::get('/menu','MenuController@index')->name('menu.index');
// Route::get('/menu/corriente','CorrienteController@index')->name('corriente.index');
// Route::post('/menu/corriente/orden','CorrienteController@store')->name('corriente.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home.index');
Route::get('/home/corriente', 'HomeController@create')->name('corriente.create');
Route::get('/home/ejecutivo', 'EjecutivoController@create')->name('ejecutivo.create');
Route::post('/home/corriente/guardar','HomeController@store')->name('corriente.store');
Route::post('/home/ejecutivo/guardar','EjecutivoController@store')->name('ejecutivo.store');

