<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//Ruta para crear usuario
Route::post('user','UserController@store');
//Ruta para el Login
Route::post('login','UserController@login');

//Protege la ruta por medio de Tokens
Route::group(['middleware' => 'auth:api'], function() {
    //Ruta 
    Route::ApiResource('directorios','ContactosController');
    Route::post('logout','UserController@logout');
});








Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





/*
Route::get('directorios', 'ContactosController@index');
Route::get('directorios/directorio', 'ContactosController@show');
Route::post('directorios', 'ContactosController@store');
Route::put('directorios/{directorio}', 'ContactosController@update');
Route::delete('directorios/{directorio}', 'ContactosController@delete');
*/
