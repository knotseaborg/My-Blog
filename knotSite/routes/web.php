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
//Blog Controller routes
Route::get('blog', ['uses' => 'BlogController@getIndex', 'as' => 'blog.index']);
Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
//Static page routes
Route::get('contact' , 'PagesController@getContact');
Route::get('/' , 'PagesController@getIndex');
Route::get('about' , 'PagesController@getAbout');
//Post routes
Route::resource('posts', 'PostsController');
//Authentication routes
Auth::routes();
Route::get('/home', 'HomeController@index');
//Category Route
Route::resource('categories', 'CategoryController', ['except' => ['create']]);
//Tag routes
Route::resource('tags', 'TagController', ['except' => ['create']]);
//Contact email sender route
Route::post('contact', 'PagesController@postContact');
