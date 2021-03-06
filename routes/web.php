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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/items/{place?}', 'ItemController@index');
Route::post('/items', 'ItemController@store');
Route::patch('/items/{item}', 'ItemController@update');
Route::delete('/items/{item}', 'ItemController@destroy');

Route::get('/places', 'PlaceController@index');
Route::get('/places/create', 'PlaceController@create');
Route::get('/places/{place}', 'PlaceController@edit');
Route::post('/places', 'PlaceController@store');
Route::patch('/places/{place}', 'PlaceController@update');
