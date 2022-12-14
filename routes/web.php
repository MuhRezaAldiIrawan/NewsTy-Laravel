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
Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/docs-nologin', 'App\Http\Controllers\MainController@docs');

Route::get('/news', 'App\Http\Controllers\NewsController@index');
Route::post('/post', 'App\Http\Controllers\NewsController@store');
Route::get('/post/{id}', 'App\Http\Controllers\NewsController@show');
Route::put('/post/{id}', 'App\Http\Controllers\NewsController@update');




