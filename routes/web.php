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

Route::get('/','Home\InicioController@index')->name('home');

// Route::get('/menu','MenuController@index')->name('menu.index');
// Route::get('/menu/corriente','CorrienteController@index')->name('corriente.index');
// Route::post('/menu/corriente/orden','CorrienteController@store')->name('corriente.store');

Auth::routes();

Route::view('/home', 'dashboard.index')->name('home.index');

Route::prefix('dashboard/corriente')->group(function () {
    Route::get('proteina', 'Corriente\ProteinaController@create')->name('proteina.create');
    Route::post('proteina/store','Corriente\ProteinaController@store')->name('proteina.store');
    Route::get('proteina/{id}','Corriente\ProteinaController@edit')->name('proteina.edit');
    Route::put('proteina/{id}/edit','Corriente\ProteinaController@update')->name('proteina.update');
    Route::delete('proteina/{id}','Corriente\ProteinaController@destroy')->name('proteina.destroy');
});
Route::prefix('dashboard/menu')->group(function () {
    Route::get('corriente','Menu\MenuController@create')->name('corriente.create');
    Route::post('corriente/store','Menu\MenuController@store')->name('corriente.store');
    Route::get('corriente/restore','Menu\MenuController@restore')->name('restore');
});
