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

use App\Events\MyChartEvent;

Route::get('/', 'HomeController@index')->name('home');
//select from DB
Route::get('/products','ProductController@index');
//show the view
Route::get('/test','ProductController@test');
//insert to DB
Route::post('/products','ProductController@store');



Auth::routes();
