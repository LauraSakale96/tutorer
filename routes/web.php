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
    Route::resource('studentprofiles', 'StudentprofilesController');
    Route::resource('teacherprofiles', 'TeacherprofilesController');
    Route::resource('subjects', 'SubjectsController');
    Route::resource('lessons', 'LessonsController');
    Route::resource('studentlists', 'StudentlistsController');
    Route::resource('file', 'FilesController');
  // Route::get('file','FilesController@create');
   //Route::post('file','FilesController@store');
   //Route::get('files.create', 'FilesController@create');
   //Route::post('files.create', 'FilesController@store');

});
