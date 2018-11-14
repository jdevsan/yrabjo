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

Route::get('/', 'WebController@inicio')->name('inicio');


Route::get('/nuevo','PokemonController@create')->name('nuevo');


Route::get('/editar/{id}','PokemonController@edit')->name('editar');

Route::get('/nuevo','PokemonController@evolv')->name('nuevo2');



Route::prefix('pokemon')->name('pokemon.')->group(function () {

    Route::get('/','PokemonController@todos')->name('todos');
    Route::post('/nuevo','PokemonController@nuevo')->name('nuevo');
    Route::post('/','PokemonController@guardar')->name('guardar');
    Route::get('/{id}','PokemonController@uno')->name('uno');
    Route::put('/{pokemon}/editar','PokemonController@editar')->name('editar');
    Route::get('/{pokemon}', 'PokemonController@actualizar')->name('actualizar');
    Route::delete('/{pokemon}', 'PokemonController@borrar')->name('borrar');

    
});

Route::get('/type','TypeController@todos')->name('tipos');
Route::get('/type/{tipo}', 'TypeController@uno')->name('tipo');

 

