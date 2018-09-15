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
    return view('home');
});

Auth::routes();

Route::group( [ 'prefix' => 'admin' , 'middleware' => 'auth'], function() {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('schools','AdminController@show')->name('showSchools');

    Route::get('school',function () {
        return view('admin.create-school')->withCode(str_random(17));
    })->name('school');

    Route::post('create/school','AdminController@create')->name('createSchool');
});
