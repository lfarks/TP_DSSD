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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clientes', 'ClientController@show')->name('allCli');
Route::get('/client/create', 'ClientController@create')->name('newCli');
Route::post('/client', 'ClientController@store');

Route::get('/incidencias', 'IncidenciaController@show')->name('allInc');
Route::get('/incidencia/create', 'IncidenciaController@create')->name('newInc');
Route::post('/incidencia', 'IncidenciaController@store');
