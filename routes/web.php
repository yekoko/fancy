<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });






 
Route::get('/', 'HomeController@index')->name('home');
Route::group(['prefix' => 'admin'],function()
{
	Auth::routes();
	Route::group(['middleware' => 'auth'],function(){
		Route::get('/','Admin\DashboardController@index');
		Route::resource('role','Admin\RoleController');
		Route::resource('user','Admin\UserController');
	});
	

});
