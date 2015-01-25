<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return Redirect::to('tasks');
});

Route::resource('tasks','tasksController');
Route::get('tasks/{id}/done','tasksController@done');
Route::get('get/data','tasksController@getData');
