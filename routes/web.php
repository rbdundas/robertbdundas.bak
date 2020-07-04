<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'NoAuthController@index')->name('index');
Route::get('/home', 'HomeController@home')->name('home');

Route::prefix('post')->group(function () {
    Route::get('/view', 'PostController@viewPost')->name('post.view');
    Route::get('/edit', 'PostController@editPost')->name('post.edit');
    Route::post('/save', 'PostController@savePost')->name('post.save');
});

