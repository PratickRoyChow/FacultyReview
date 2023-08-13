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

Route::get('/', 'HomeController@index')->name('home');;

// Login route
Route::get('signin', 'AuthController@showLoginForm')->name('signin');
Route::post('login', 'AuthController@login')->name('login');
Route::get('logout', 'AuthController@logout')->name('logout');

Route::get('/register', 'AuthController@showRegistrationForm')->name('register');
Route::post('/submit_registration', 'AuthController@submit_registration')->name('submit_registration');

Route::get('/student_dashboard', 'HomeController@student_dashboard')->name('student_dashboard');

Route::get('/edit_profile', 'HomeController@edit_profile')->name('edit_profile');

Route::post('/update_student/{id}', 'HomeController@update_student')->name('update_student');

Route::get('/student_add_faculty', 'HomeController@student_add_faculty')->name('student_add_faculty');

Route::post('/student_create_faculty', 'HomeController@student_create_faculty')->name('student_create_faculty');

Route::get('/student_add_course', 'HomeController@student_add_course')->name('student_add_course');

Route::post('/student_create_course', 'HomeController@student_create_course')->name('student_create_course');

Route::get('/student_add_comment', 'HomeController@student_add_comment')->name('student_add_comment');

Route::post('/student_create_comment', 'HomeController@student_create_comment')->name('student_create_comment');

Route::get('/show_departments', 'HomeController@show_departments')->name('show_departments');

Route::get('/show_department_info/{id}', 'HomeController@show_department_info')->name('show_department_info');

Route::get('/department_all_faculty/{id}', 'HomeController@department_all_faculty')->name('department_all_faculty');

Route::get('/department_all_courses/{id}', 'HomeController@department_all_courses')->name('department_all_courses');

Route::get('/department_all_majors/{id}', 'HomeController@department_all_majors')->name('department_all_majors');

Route::get('/show_faculty_info/{id}', 'HomeController@show_faculty_info')->name('show_faculty_info');

Route::get('/student_search', 'HomeController@student_search')->name('student_search');

Route::get('/student_view_courses', 'HomeController@student_view_courses')->name('student_view_courses');

Route::get('/student_view_faculties', 'HomeController@student_view_faculties')->name('student_view_faculties');