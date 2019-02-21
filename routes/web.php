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


/* Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{ id }', 'ProductsController@show');
Route::post('/products', 'ProductsController@store');
Route::patch('/products/{ id }/edit', 'ProductsController@edit'); */
Route::resource('/products', 'ProductsController')->middleware('auth');

Route::get('/categorys', 'CategoryController@index');
Route::post('/categorys', 'CategoryController@store');

// @TODO
// Make a Vue Ajax Call 
Route::get('categorys/{id}/edit', 'CategoryController@edit');
Route::delete('categorys/{id}', 'CategoryController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
