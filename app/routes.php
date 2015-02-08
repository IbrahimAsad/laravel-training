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



Route::get('/',function(){
	if(Session::has('admin_id')) 
		return View::make('/dashboard');
	else
		return View::make('/login');
});

Route::get('/dashboard',function(){
	// return View::make('/dashboard');
	if(Session::has('admin_id')) 
		return View::make('/dashboard');
	else
		return View::make('/login');
});


Route::get('/addDriver',function(){
// return View::make('/new_driver');
if(Session::has('admin_id')) 
		return View::make('/new_driver');
	else
		return View::make('/login');
});

Route::get('/addTask', function(){
	// return View::make('index');
	if(Session::has('admin_id')) 
		return View::make('/index');
	else
		return View::make('/login');

});

Route::get('/logout',function(){
	Session::flush();
	return View::make('/login');
});
