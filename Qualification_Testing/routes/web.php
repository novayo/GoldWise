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

Route::get('/', 'bannerController@index')->name('home');
Route::post('/load_more', 'bannerController@load_more');
Route::post('/', 'UserController@store');

Route::get('/detail/{guideline}', 'bannerController@show');
Route::get('/upload', 'UserController@index');



// user login
Auth::routes();

// 第三方登入
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');