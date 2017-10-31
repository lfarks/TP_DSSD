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
//Acceso solo a usuarios comunes
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/client/create', 'ClientController@create')->name('newCli');
    Route::post('/client', 'ClientController@store')->name('storeCli');
});
//Acceso solo a empleados
Route::group(['middleware' => ['role:empleado']], function () {
    //clientes
    Route::get('/clientes', 'ClientController@show')->name('allCli');
    //incidencias
    Route::get('/incidencias/all', 'IncidenciaController@listAll')->name('allIncs');
    Route::get('/incidencia/{exp}/fotos/create', 'IncidenciaController@createFoto')->name('newFotoInc');
    Route::post('/incidencia/{exp}/fotos/upload', 'IncidenciaController@upload')->name('upFotoInc');
});
//Acceso solo a clientes
Route::group(['middleware' => ['role:cliente']], function () {
    //clientes
    Route::get('/client/edit', 'ClientController@edit')->name('editCli');
    Route::put('/client/update', 'ClientController@update')->name('updateCli');
    //incidencias
    Route::get('/incidencia/create', 'IncidenciaController@create')->name('newInc');
    Route::post('/incidencia', 'IncidenciaController@store')->name('storeInc');
    Route::get('/incidencias', 'IncidenciaController@show')->name('allInc');
    Route::get('/incidencia/{id}/edit', 'IncidenciaController@edit')->name('editInc');
    Route::put('/incidencia/{id}/update', 'IncidenciaController@update')->name('updateInc');
});
//Acceso mixto clientes y empleados
Route::group(['middleware' => ['role:cliente,empleado']], function () {
    //clientes
    //incidencias
    Route::get('/incidencia/{id}', 'IncidenciaController@showOne')->name('showInc');
});
