<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your module. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['namespace' => 'Estados'], function () {
	Route::get('/', 'EstadoController@index');
});

Route::group(['namespace' => 'Backend'], function(){
	Route::post('/api/estados/criar', 'APIController@create');
	Route::patch('api/estado/editar/{id}', 'APIController@patch');
	Route::delete('api/estado/deletar/{id}', 'APIController@destroy');
});