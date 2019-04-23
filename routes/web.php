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

use FarhanWazir\GoogleMaps\GMaps;
use GoogleMaps\GoogleMaps;

Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('location', 'LocationController');


Route::get('category', 'CategoryController@index')->name('category.index');
Route::get('category/create', 'CategoryController@create')->name('category.create');

Route::get('category/{id}', 'CategoryController@show')->name('category.index');
Route::post('category', 'CategoryController@store')->name('category.store');
Route::get('category/{id}/edit', 'CategoryController@edit')->name('category.edit');
Route::put('category/{id}', 'CategoryController@update')->name('category.update');
Route::delete('category/{id}','CategoryController@destroy')->name('category.destroy');

Route::get('test' , function () {
    return view('javad');
});





