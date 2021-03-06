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

Route::get('/', 'EmployeeController@index');
Route::get('/home', 'ResourceController@index');
Route::auth();
Route::get('/myResource', 'HomeController@myResource')->name('home.myResource');
Route::resource('employee', 'EmployeeController');
Route::resource('resource', 'ResourceController', ['except' => 'show']);
Route::resource('device', 'DeviceController');
Route::resource('job', 'JobController');
Route::post('/myResource/update', 'ResourceController@updateStatus')->name('home.employ.updateStatus');
Route::post('/myResource/updateStatusDevice', 'ResourceController@updateStatusDevice')->name('home.device.updateStatus');
Route::get('/resource/job', 'ResourceController@jobStatus')->name('resource.job');
Route::get('/resource/job/negotiating', 'ResourceController@jobNegotiating')->name('resource.job.negotiating');
Route::get('/resource/job/hired', 'ResourceController@jobHired')->name('resource.job.hired');
Route::get('/job/{id}/hint', 'ResourceController@rendHintModal')->name('job.hint');
Route::get('/resource/device', 'ResourceController@getDevice')->name('resource.device');
