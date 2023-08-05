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

Route::get('/', function () {
    return view('welcome');
});

// Login route
Route::get('signin', 'AuthController@showLoginForm')->name('signin');
Route::post('signin', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/register', 'AuthController@showRegistrationForm')->name('register');
Route::post('/submit_registration', 'AuthController@submit_registration')->name('submit_registration');


