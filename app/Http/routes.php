<?php

/*
 * |--------------------------------------------------------------------------
 * | Application Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register all of the routes for an application.
 * | It's a breeze. Simply tell Laravel the URIs it should respond to
 * | and give it the controller to call when that URI is requested.
 * |
 */
Route::get ( '/', 'WelcomeController@index' );
Route::get ( 'home', 'HomeController@index' );

// Route::get('isd', 'Focus/Controller@index');

Route::controllers ( [ 
		'auth' => 'Auth\AuthController',
		//'password' => 'Auth\PasswordController' 
]);

/*Route::group (['prefix' => 'focus','namespace' => 'Focus'], function () {
	// Route::resource('isd','IsdController');
	// Route::get('isd','IsdController@getAjax');
	Route::resource ( 'isd', 'IsdController' );
	Route::post ( 'isd', 'IsdController@getGraphic' );
});*/

	
Route::group (['prefix' => 'admin','namespace' => 'Admin'], function () {
	//Route::resource( 'auth', 'SentinelController' );
	Route::resource( 'users', 'UserController');
	Route::resource( 'roles', 'RolesController');
	Route::resource( 'module','ModuleController');
	Route::post ('register', 'UserController@postRegister' );
});
	
