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
//untuk komentari
Route::get('/post/{id}', 'VisitorController@showPage');
//untuk proses penyimpanan database komentar
Route::post('/comment', 'VisitorController@store');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
	Route::resource('/post','PostController');
	Route::post('/delete','PostController@destroyall');
	Route::post('/deletecomment','CommentController@destroyall');
	Route::get('/deleteone/{id}','CommentController@destroyone');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/comment','CommentController@index');   
});
Auth::routes();
