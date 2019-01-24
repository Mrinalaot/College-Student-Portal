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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@index')->middleware('auth','admin');
Route::get('/admin/profile', 'AdminController@profile')->middleware('auth','admin');
Route::post('/admin/profile', 'AdminController@update_profile');
Route::get('/admin/change_password', 'AdminController@change_password')->middleware('auth','admin');
Route::post('/admin/change_password', 'AdminController@change_password__');
//Route::post('/admin/profile', 'AdminController@update_avatar');

Route::get('/admission', 'AdmissionController@index')->middleware('auth','admission');
Route::get('/admission/profile', 'AdmissionController@profile')->middleware('auth','admission');

Route::get('/exam', 'ExamController@index')->middleware('auth','exam');
Route::get('/exam/profile', 'ExamController@profile')->middleware('auth','exam');

Route::get('/placement', 'PlacementController@index')->middleware('auth','placement');
Route::get('/placement/profile', 'PlacementController@profile')->middleware('auth','placement');

Route::get('/student', 'StudentController@index')->middleware('auth','student');
Route::get('/student/profile', 'StudentController@profile')->middleware('auth','student');




Route::get('/home', 'HomeController@index')->name('home');
