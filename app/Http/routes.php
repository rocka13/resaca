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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
 Route::resource('salas', 'salasController');
 Route::resource('elementos', 'elementosController');
 Route::resource('tipo_elementos', 'tipoElementosController');
 Route::resource('elementos_salas','elementos_salasController');

 Route::get('ver/elementos/{id}', array('as' => 'ver/elementos', 'uses' => 'elementos_salasController@ver'));

 
/*
 Route::get('elementos/create', function(){
 	$tipos = tipo_elementos::all();
 	return view::make('edit')->with('tipos', $tipos);
 });

 */