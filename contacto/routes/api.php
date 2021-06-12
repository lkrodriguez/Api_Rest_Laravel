<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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





