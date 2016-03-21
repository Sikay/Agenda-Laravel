<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });
});

Route::group(['middleware' => ['web']], function () {

	Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'namespace' => 'Admin'], function(){

	    Route::resource('users', 'UsersController');

	});
});

Route::group(['middleware' => ['web']], function () {

    Route::group(['namespace' => 'auth'], function(){

            Route::resource('auth', 'AuthController');

    });
});

Route::group(['middleware' => ['web']], function () {

    Route::group(['prefix' => 'agenda', 'middleware' => 'auth', 'namespace' => 'Agenda'], function(){

        Route::resource('contactos', 'ContactosController');

    });
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
