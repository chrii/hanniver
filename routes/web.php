<?php
use Illuminate\Http\Request;
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

/**
 * Public Routes 
 * These are accessible without any authorization
 */
Route::get('/', function () {
    return view('welcome');
});
Route::get('/menu', 'MenuController@index');


/* Route::get('/products', 'ProductsController@index');
Route::get('/products/create', 'ProductsController@create');
Route::get('/products/{ id }', 'ProductsController@show');
Route::post('/products', 'ProductsController@store');
Route::patch('/products/{ id }/edit', 'ProductsController@edit'); */

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

/**
 * These routes are only accessible from Admin and Waiter (Kellner)
 */
Route::middleware('staff')->group(function() {
    Route::resource('/products', 'ProductsController');

    Route::get('/categorys', 'CategoryController@index');
    Route::post('/categorys', 'CategoryController@store');

    // @TODO
    // Make Ajax Calls 
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
    Route::delete('/upload/delete/{id}', 'UploadController@destroy');

    Route::get('/terminal', 'TerminalController@index');

});

/**
 * User Routes
 * Controlled by auth Middleware in the Controller themself
 */
Route::post('/menu/bon/send', 'MenuController@storeBon');
Route::post('/menu/bon', 'MenuController@bon');
Route::get('/menu/bon', 'MenuController@showBon');

Route::get('/tables/{id}', 'TablesController@show');

Route::get('/bill', 'BillController@show');