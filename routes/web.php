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
    return view('index');
});

Auth::routes();

Route::group( [ 'prefix' => 'admin' , 'middleware' => 'auth'], function() {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('school',function () {
        return view('school-list');
    });
    Route::get('schools','AdminController@show')->name('showSchools');

    Route::post('school','AdminController@create')->name('createSchool');
});
