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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::view('/fonctionnement', 'fonctionnement')->name('fonctionnement');

// Products
Route::get('/products', 'ProductController@index')->name('products.home');
Route::middleware('auth')->group(function () {
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::post('/products', 'ProductController@store')->name('products.store');
});

// For testing roles
Route::get('/test', 'HomeController@index')->name('test');