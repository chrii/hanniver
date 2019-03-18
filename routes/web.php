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

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::middleware('staff')->group(function() {
    Route::resource('/products', 'ProductsController');

    Route::get('/categorys', 'CategoryController@index');
    Route::post('/categorys', 'CategoryController@store');

    // @TODO
    // Make a Vue Ajax Call 
    Route::get('categorys/{id}/edit', 'CategoryController@edit');
    Route::delete('categorys/{id}', 'CategoryController@destroy');

    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route::get('/users/create', 'UserController@create');
    Route::get('/users/{uid}', 'UserController@show');
    Route::patch('/users/{uid}/edit', 'UserController@edit');
    
    Route::get('/groups', 'GroupController@index');
    Route::post('/groups', 'GroupController@store');
    
    Route::get('/tables', 'TablesController@index');
    Route::post('/tables', 'TablesController@store');
    Route::post('/tables/checkin', 'TablesController@checkin');
    
    Route::get('/upload', 'UploadController@index');
    Route::post('/upload', 'UploadController@store');
    Route::get('/upload/unzip', 'UploadController@unzip');
    Route::get('/upload/beam', 'UploadController@storeDatabase');
});

Route::get('/tables/{id}', 'TablesController@show');
Route::get('/menu', 'MenuController@index');