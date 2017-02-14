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

Route::get('contact' , 'PagesController@getContact');
Route::get('/' , 'PagesController@getIndex');
Route::get('about' , 'PagesController@getAbout');
Route::resource('posts', 'PostsController');