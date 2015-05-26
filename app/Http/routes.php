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
Route::group(array('before' => 'auth'), function()
{
	Route::resource('project', 'projectController');
	Route::resource('task', 'taskController');
	Route::resource('story', 'storyController');
	Route::resource('comment', 'commentController');
	Route::resource('releasePlan', 'releasePlanController');
	Route::resource('sprintPlan', 'sprintPlanController');

	// Specific route
	Route::get('timeline', 'miscController@timeline');
	Route::get('backlog', 'miscController@backlog');
	Route::get('scrumBoard', 'scrumBoardController@index');
	Route::post('updateTask', 'webServiceController@updateTask');
	Route::post('deleteTask', 'webServiceController@deleteTask');
	Route::post('updateReleasePlanList', 'webServiceController@updateReleasePlanList');	
	Route::post('updateLog', 'webServiceController@updateLog');    
});

Route::get('/', 'homeController@index');
Route::get('home', 'homeController@index');

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('auth/login');
});

//auth
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
