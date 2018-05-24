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
Route::get('/help', 'HelpController@index')->name('help');
Route::get('/info', 'InfoController@index')->name('info');

Route::middleware(['auth'])->group( function(){
    
    Route::resource('subjects', 'SubjectsController');
    Route::resource('lessons', 'LessonsController');
    Route::resource('students', 'StudentsController');
    Route::resource('diagnoses', 'DiagnosesController');
    Route::resource('file', 'FilesController');
    Route::get('profile', 'UserController@profile');
    Route::post('profile', 'UserController@update_image');
    //Route::get('profile/edit', 'UserController@edit');
    

});
