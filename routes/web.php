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

Auth::routes();

Route::view('/home', 'dashboard.index')->name('home.index');

Route::prefix('dashboard')->group(function () {
    Route::prefix('corriente')->group(function () {
        Route::get('proteina', 'Corriente\ProteinaController@create')->name('proteina.create');
        Route::post('proteina/store','Corriente\ProteinaController@store')->name('proteina.store');
        Route::get('proteina/{id}','Corriente\ProteinaController@edit')->name('proteina.edit');
        Route::put('proteina/{id}/edit','Corriente\ProteinaController@update')->name('proteina.update');
        Route::delete('proteina/{id}/destroy','Corriente\ProteinaController@destroy')->name('proteina.destroy');

        Route::get('principio', 'Corriente\PrincipioController@create')->name('principio.create');
        Route::post('principio/store','Corriente\PrincipioController@store')->name('principio.store');
        Route::get('principio/{id}','Corriente\PrincipioController@edit')->name('principio.edit');
        Route::put('principio/{id}/edit','Corriente\PrincipioController@update')->name('principio.update');
        Route::delete('principio/{id}/destroy','Corriente\PrincipioController@destroy')->name('principio.destroy');

        Route::get('sopa', 'Corriente\SopaController@create')->name('sopa.create');
        Route::post('sopa/store','Corriente\SopaController@store')->name('sopa.store');
        Route::get('sopa/{id}','Corriente\SopaController@edit')->name('sopa.edit');
        Route::put('sopa/{id}/edit','Corriente\SopaController@update')->name('sopa.update');
        Route::delete('sopa/{id}/destroy','Corriente\SopaController@destroy')->name('sopa.destroy');
    });
    Route::prefix('ejecutivo')->group(function () {
        Route::get('especial', 'ejecutivo\EjecutivoController@create')->name('ejecutivo.create');
        Route::post('especial/store','ejecutivo\EjecutivoController@store')->name('ejecutivo.store');
        Route::get('especial/{id}','ejecutivo\EjecutivoController@edit')->name('ejecutivo.edit');
        Route::put('especial/{id}/edit','ejecutivo\EjecutivoController@update')->name('ejecutivo.update');
        Route::delete('especial/{id}/destroy','ejecutivo\EjecutivoController@destroy')->name('ejecutivo.destroy');
    });
    Route::prefix('menu')->group(function () {
        Route::get('corriente','Menu\MenuController@create')->name('corriente.create');
        Route::post('corriente/store','Menu\MenuController@store')->name('corriente.store');
        Route::get('ejecutivo','Menu\MenuController@create')->name('ejecutivo.create');
        // Route::post('ejecutivo/store','Menu\MenuController@store')->name('ejecutivo.store');
    });
        Route::prefix('menu/corriente/restore')->group(function () {
        Route::get('proteina','Menu\MenuController@restorePro')->name('restorePro');
        Route::get('principio','Menu\MenuController@restorePri')->name('restorePri');
        Route::get('sopa','Menu\MenuController@restoreSop')->name('restoreSop');
        Route::get('all','Menu\MenuController@restoreAll')->name('restoreAll');
    });
    Route::prefix('consumir')->group(function () {
        Route::get('corriente','Menu\ConsumirController@create')->name('consumirC.create');
        Route::post('corriente/store','Menu\ConsumirController@store')->name('consumirC.store');
        Route::get('corriente/restore','Menu\ConsumirController@restore')->name('consumirC.restore');
    });
});
