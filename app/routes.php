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


Route::resource('admin/login','AdminLoginController');
Route::resource('admin/addTask','AddTaskController');
Route::resource('admin/getTasks','AdminDashboarCenterController@getTasks');
Route::resource('admin/getAllDrivers','AdminDashboarCenterController@getAllDrivers');
Route::resource('admin/assignTask','AdminDashboarCenterController@assignTask');

Route::resource('driver/getTasks','DriverGetTasksController');
Route::resource('driver/pingLocation','PingDriverLocationController');
Route::resource('driver/login','DriverLoginController');
Route::resource('driver/addNote','DriverAddNoteController');
// Route::resource('admin/getDrivers','AdminGetTasksController@Hello');
Route::resource('driver/updateTask','DriverChangeTaskStatusController');



Route::get('/login',function(){
	return View::make('/login');
});

Route::get('/dashboard',function(){
	return View::make('/dashboard');
});


Route::get('/addDriver',function(){
return View::make('/new_driver');
});
Route::get('/', function()
{
	// $results = DB::select('select * from tasks ');
		// var_dump($results);
	return View::make('index');
	// return "<h1> adsa d</h1>"11;
});

