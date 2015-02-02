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
Session::put('user_id', 1);

Route::resource('task','AddTaskController');

Route::resource('getTasks','getTaskController');

Route::get('/', function()
{
	// $results = DB::select('select * from tasks ');
		// var_dump($results);
	return View::make('index');
	// return "<h1> adsa d</h1>"11;
});

