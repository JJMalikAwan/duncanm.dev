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

Route::get('/', 'PostController@index')
    ->name('posts.index');

Route::get('/about', 'AboutController')
    ->name('about');

Route::get('/create', 'PostController@create')
    ->name('posts.create')
    ->middleware('auth');

Route::post('/create', 'PostController@store')
    ->name('posts.store')
    ->middleware('auth');

Route::get('/{post}', 'PostController@show')
    ->name('posts.show');

Route::get('/{post}/edit', 'PostController@edit')
    ->name('posts.edit')
    ->middleware('auth');

Route::post('/{post}/edit', 'PostController@update')
    ->name('posts.update')
    ->middleware('auth');

Route::get('/{post}/delete', 'PostController@destroy')
    ->name('posts.destroy')
    ->middleware('auth');
