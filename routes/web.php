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
Route::resource('/', 'VisitorController');

Route::post('/comment', 'CommentController@store');

Route::get('/post/{id}', 'VisitorController@showPage');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
	Route::resource('/post','PostController');
	Route::post('/delete','PostController@destroyall');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/comment','CommentController@index');   
});
Auth::routes();
