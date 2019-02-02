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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items', 'ItemController@index');

Route::post('/items', 'ItemController@store');

Route::patch('/items/{item}', 'ItemController@update');

Route::delete('/items/{item}', 'ItemController@destroy');

Route::get('/places', 'PlaceController@index');
Route::get('/places/create', 'PlaceController@create');
Route::post('/places', 'PlaceController@store');
