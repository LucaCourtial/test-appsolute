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

Route::get('/flux', 'FluxController@index');

Route::post('/bookmarks', 'BookmarksController@store');

Auth::routes();

Route::get('/bookmarks', 'BookmarksController@index');

Route::delete('/bookmarks/{title}', 'BookmarksController@destroy');

Route::get('/home', 'HomeController@index')->name('home');
