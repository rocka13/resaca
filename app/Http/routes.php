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
 Route::get('admin/reservas/{id}', 'reservasController@Misreservas');
 Route::resource('misreservas', 'MisReservasController');

 Route::get('usuario/misreservas/{id}', 'UserReservaController@Misreservas');
 Route::resource('userreservas', 'UserReservaController');

 
Route::get('resaca', 'ResacaAuthController@index');
Route::post('resaca/auth', 'ResacaAuthController@auth');
Route::get('resaca/callback', 'ResacaAuthController@callback');
Route::get('resaca/done', 'ResacaAuthController@done');
Route::post('resaca/revoke', 'ResacaAuthController@revoke');








 
 
 /*Route::get('horas', 'reservasController@DiferenciasHoras');*/
