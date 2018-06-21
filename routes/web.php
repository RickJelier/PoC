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

Route::get('/', 'AppointmentController@index');
Route::get('/phpinfo', 'HomeController@info');
Route::post('/poc/api/appointment/create', 'AppointmentController@post_create');

Auth::routes();

Route::get('/appointment','AppointmentController@add');
Route::post('/appointment','AppointmentController@create');

Route::get('/appointment/{appointment}','AppointmentController@edit');
Route::post('/appointment/{appointment}','AppointmentController@update');

Route::get('logs', 'HomeController@logActivity');