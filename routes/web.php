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
Route::get('/getAjaxBilets', 'StartController@getAjaxBilets');
Route::post('/addBilet', 'StartController@addBilet');
Route::get('/data-chart', 'StartController@dataChart');
Route::get('/random-chart', 'StartController@random');

