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


Auth::routes();

Route::get('/', 'HomeController@display');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/createblog', 'PostsController@createblog');

Route::get('/createblog/{id}/comments', 'PostsController@viewblog');

Route::get('/{id}/edit', 'PostsController@editblog')->name('edit-blog');
Route::post('/{id}/edit_info', 'UsersController@edit_info')->name('edit-info');

Route::get('/{id}/edit_info', 'UsersController@edit_info');

Route::post('edit', '\App\Http\Controllers\PostsController@updateEdit')->name('update-edit');
Route::post('edit_info', '\App\Http\Controllers\UsersController@updateInfo')->name('update-info');
Route::get('edit_info', '\App\Http\Controllers\UsersController@updateInfo');


Route::delete('create-blog', '\App\Http\Controllers\PostsController@deleteblog')->name('delete-blog');
Route::post('comment', '\App\Http\Controllers\PostsController@addcomment')->name('add-comment');
Route::delete('comment', '\App\Http\Controllers\PostsController@deletecomment')->name('delete-comment');
Route::post('form-test', '\App\Http\Controllers\Auth\LoginController@login');
Route::post('create-blog', '\App\Http\Controllers\PostsController@createblog');
Route::post('/createblog', '\App\Http\Controllers\PostsController@getblog');

Route::get('admin', 'PostsController@adminpage', ['middleware' => ['auth', 'admin']]);
Route::delete('user{id}', '\App\Http\Controllers\UsersController@deleteuser')->name('delete-user');
Route::post('postdelete-user', '\App\Http\Controllers\UsersController@userpage',['middleware' => ['auth', 'admin']])->name('postdelete-user');
Route::get('postdelete-user', '\App\Http\Controllers\UsersController@userpage',['middleware' => ['auth', 'admin']]);

Route::post('user{id}', '\App\Http\Controllers\UsersController@assign_admin')->name('assign-admin');
Route::post('postassign-admin', '\App\Http\Controllers\UsersController@assignpage',['middleware' => ['auth', 'admin']]);
Route::get('postassign-admin', '\App\Http\Controllers\UsersController@assignpage',['middleware' => ['auth', 'admin']]);
