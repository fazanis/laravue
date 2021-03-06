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
Route::get('/', 'StartController@index');
Route::get('/getjson', 'StartController@getjson');
Route::get('/admin/settings', 'StartController@getjson2');
Route::get('/getAjaxBilets', 'StartController@getAjaxBilets');
Route::post('/addBilet', 'StartController@addBilet');
Route::post('/bilet/remove', 'StartController@remove');
Route::get('/bilet/edit', 'StartController@edit');
Route::get('/data-chart', 'StartController@dataChart');
Route::get('/random-chart', 'StartController@random');
Route::get('/getposts', 'StartController@getPosts');
Route::post('/activate', 'StartController@activate');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
