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

Route::resource('project', 'projectController');
Route::resource('task', 'taskController');
Route::resource('story', 'storyController');
Route::resource('comment', 'commentController');



// Specific route
Route::get('timeline', 'miscController@timeline');
Route::get('scrumBoard', 'scrumBoardController@index');