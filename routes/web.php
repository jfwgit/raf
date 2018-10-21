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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::group( [ 'prefix' => 'admin' , 'middleware' => 'auth'], function() {
    Route::get('/', 'AdminController@index')->name('admin');
    Route::get('schools','SchoolController@index')->name('showSchools');
    Route::get('teachers/{page?}/{parameters?}','TeacherController@index')->name('showTeachers');

    Route::group([ 'prefix' => 'school'], function() {
        Route::get('/',function () {
            return view('admin.create-school')->with('code', str_random(17));
        })->name('school');

        Route::post('create','SchoolController@create')->name('createSchool');
        Route::get('/{school}','SchoolController@show')->name('showSchool');
        Route::post('/edit/{school}','SchoolController@update')->name('updateSchool');
        Route::get('/deactivate/{school}','SchoolController@deactivate')->name('deactivateSchool');
        Route::get('/activate/{school}','SchoolController@activate')->name('activateSchool');
    });

    Route::group([ 'prefix' => 'teacher'], function() {
        Route::get('/','TeacherController@indexCreate')->name('teacher');
        Route::post('create','TeacherController@create')->name('createTeacher');
        Route::get('/{teacher}','TeacherController@show')->name('showTeacher');
        Route::post('/edit/{teacher}','TeacherController@update')->name('updateTeacher');
        Route::get('view/applied/{page}','TeacherController@applied')->name('appliedTeachers');
        Route::get('/deactivate/{teacher}','TeacherController@deactivate')->name('deactivateTeacher');
        Route::get('/activate/{teacher}','TeacherController@activate')->name('activateTeacher');
    });
});
