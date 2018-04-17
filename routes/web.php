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

Route::get('/', 'PageController@index');
Route::get('/info', 'PageController@info');
Route::get('/purchase', 'PageController@purchase');
Route::get('/contact', 'PageController@contact');
Route::post('/contact', 'PageController@sendContact');

Route::get('/home', 'DashboardController@home');
Route::post('/home', 'DashboardController@home');
Route::get('/about', 'DashboardController@about');
Route::get('/devices', 'DashboardController@devices');
Route::post('/devices', 'DashboardController@storedevice');
Route::delete('/devices', 'DashboardController@deletedevice');
Route::get('/settings', 'DashboardController@settings');
Route::get('/advanced', 'DashboardController@advanced');
Route::get('/documentation', 'DashboardController@documentation');
Route::post('/addpoints/', 'DashboardController@addDatapoints');
Route::post('/home/{id}', 'DashboardController@home');
Route::post('/{device}/{datapoints}', 'DashboardController@generateChart');

Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');
