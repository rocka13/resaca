<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function(){
	return view('login');
});

Route::resource('login', 'LoginController');

 Route::resource('salas', 'salasController');

 Route::resource('elementos', 'elementosController');

 Route::resource('tipo_elementos', 'tipoElementosController');

 Route::resource('elementos_salas','elementos_salasController');
 Route::get('ver/elementos/{id}', array('as' => 'ver/elementos', 'uses' => 'elementos_salasController@ver'));

 Route::resource('reservas','reservasController');
 Route::get('confirmar/{id}', array('as' => 'confirmar', 'uses' => 'reservasController@confirmar'));
 Route::get('reservas/buscar/{usuario}',array('as'=>'reservas.buscar','uses' => 'reservasController@buscar'));
 Route::get('horas/fecha/{age}/{mes}/{dia}/aula/{aula}', 'reservasController@DiferenciasHoras');

 Route::resource('usuarios','usuariosController');




 
 
 /*Route::get('horas', 'reservasController@DiferenciasHoras');*/
