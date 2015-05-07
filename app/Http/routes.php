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

Route::get('/', 'homeController@index');
Route::get('project/create', 'projectController@create');
Route::get('project', 'projectController@index');
Route::get('project/{id}', 'projectController@show');
Route::post('project', 'projectController@store');

Route::get('task', 'taskController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
