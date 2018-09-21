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

Route::get('/', 'EmployeeController@index')->name('home.employ');
Route::get('/device', 'DeviceController@index')->name('home.device');
Route::get('/findJob', 'HomeController@findJob')->name('home.findJob');
Route::get('/myResource', 'HomeController@myResource')->name('home.myResource');
Route::resource('employee', 'EmployeeController');
Route::resource('resource', 'ResourceController');
