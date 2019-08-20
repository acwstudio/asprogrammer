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
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
/* Admin panel */
Route::namespace('Admin')->middleware('auth')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('abouts', 'AboutController');
    Route::resource('works', 'WorkController');
    Route::resource('headers', 'HeaderController');
    Route::resource('intros', 'IntroController');

//    Route::post('activator',  ['as' => 'activator', 'uses' => 'AjaxController@activator']);
//    Route::post('dropzone-store', ['as' => 'dropzone-store', 'uses' => 'DropzoneController@store']);
//    Route::post('dropzone-delete', ['as' => 'dropzone-delete', 'uses' => 'DropzoneController@delete']);

});