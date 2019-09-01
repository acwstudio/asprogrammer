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

Route::get('/', 'SiteController@index')->name('site');
Route::get('lang/{language}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

//Route::get('contact', 'ContactController@create')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('send');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/* Admin panel */
Route::namespace('Admin')->middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('abouts', 'AboutController');
    Route::resource('works', 'WorkController');
    Route::resource('headers', 'HeaderController');
    Route::resource('intros', 'IntroController');

    Route::post('activator',  ['as' => 'activator', 'uses' => 'ActivatorController@activate']);

    Route::post('image-store', ['as' => 'img-store', 'uses' => 'ImageUploadController@store']);
    Route::post('image-delete', ['as' => 'img-delete', 'uses' => 'ImageUploadController@delete']);

//    Route::post('dropzone-store', ['as' => 'dz-store', 'uses' => 'ImageUploadController@dropzoneStore']);
//    Route::post('dropzone-delete', ['as' => 'dz-delete', 'uses' => 'ImageUploadController@dropzoneDelete']);
//    Route::post('summernote-store', ['as' => 'smn-store', 'uses' => 'ImageUploadController@summernoteStore']);
//    Route::post('summernote-delete', ['as' => 'smn-delete', 'uses' => 'ImageUploadController@summernoteDelete']);

});