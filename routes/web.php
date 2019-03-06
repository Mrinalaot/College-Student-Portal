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

Auth::routes(['verify' => true]); //Mail Authentication

Route::get('/home', 'HomeController@index')->name('home');  //Added midd

Route::get('/admin', 'AdminController@index')->middleware('auth','admin');
Route::get('/admin/profile', 'AdminController@profile')->middleware('auth','admin');
Route::post('/admin/profile', 'AdminController@update_profile');
Route::get('/admin/change_password', 'AdminController@change_password')->middleware('auth','admin');
Route::post('/admin/change_password', 'AdminController@change_password__');
Route::get('/admin/generate_regcode', 'AdminController@generate_regcode')->middleware('auth','admin');
Route::post('/admin/generate_regcode', 'AdminController@generate_regcode__');
Route::get('/admin/manage_staff', 'AdminController@manage_staff')->middleware('auth','admin');
Route::post('/admin/manage_staff', 'AdminController@manage_staff__');
Route::get('/admin/remove_staff', 'AdminController@remove_staff')->middleware('auth','admin');
Route::post('/admin/remove_staff', 'AdminController@remove_staff__');
Route::get('/admin/sendmail', 'AdminController@sendmail')->middleware('auth','admin');


Route::get('/admission', 'AdmissionController@index')->middleware('auth','admission');
Route::get('/admission/profile', 'AdmissionController@profile')->middleware('auth','admission');
Route::post('/admission/profile', 'AdmissionController@update_profile');
Route::get('/admission/change_password', 'AdmissionController@change_password')->middleware('auth','admission');
Route::post('/admission/change_password', 'AdmissionController@change_password__');


Route::post('/admission/form_submit_1', 'AdmissionController@form_submit_1');
Route::post('/admission/form_submit_2', 'AdmissionController@form_submit_2');
Route::post('/admission/form_submit_3', 'AdmissionController@form_submit_3');
Route::post('/admission/form_submit_4', 'AdmissionController@form_submit_4');
Route::post('/admission/form_submit_5', 'AdmissionController@form_submit_5');


Route::get('/exam', 'ExamController@index')->middleware('auth','exam');
Route::get('/exam/profile', 'ExamController@profile')->middleware('auth','exam');
Route::post('/exam/profile', 'ExamController@update_profile');
Route::get('/exam/change_password', 'ExamController@change_password')->middleware('auth','exam');
Route::post('/exam/change_password', 'ExamController@change_password__');

Route::get('/placement', 'PlacementController@index')->middleware('auth','placement');
Route::get('/placement/profile', 'PlacementController@profile')->middleware('auth','placement');
Route::post('/placement/profile', 'PlacementController@update_profile');
Route::get('/placement/change_password', 'PlacementController@change_password')->middleware('auth','placement');
Route::post('/placement/change_password', 'PlacementController@change_password__');

Route::get('/student', 'StudentController@index')->middleware('auth','student');
Route::get('/student/profile', 'StudentController@profile')->middleware('auth','student');
Route::post('/student/profile', 'StudentController@update_profile');
Route::get('/student/change_password', 'StudentController@change_password')->middleware('auth','student');
Route::post('/student/change_password', 'StudentController@change_password__');
Route::get('/student/print_view', 'StudentController@print_view')->middleware('auth','student');


Route::post('/student/form_submit_1', 'StudentController@form_submit_1');
Route::post('/student/form_submit_2', 'StudentController@form_submit_2');
Route::post('/student/form_submit_3', 'StudentController@form_submit_3');
Route::post('/student/form_submit_4', 'StudentController@form_submit_4');
Route::post('/student/form_submit_5', 'StudentController@form_submit_5');
