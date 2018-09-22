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

Route::get('/base', function () {
    return view('welcome');
});

Route::get('/', 'ResourceController@index');
Route::get('/home', 'ResourceController@index');
Route::auth();
Route::get('/myResource', 'HomeController@myResource')->name('home.myResource');
Route::resource('employee', 'EmployeeController');
Route::resource('resource', 'ResourceController');
Route::resource('device', 'DeviceController');
Route::resource('job', 'JobController');
Route::post('/myResource/update', 'ResourceController@updateStatus')->name('home.employ.updateStatus');
