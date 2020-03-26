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
Route::get('/products', 'ProductController@index')->name('products.index');
Route::middleware('auth')->group(function () {
    Route::get('/products/create', 'ProductController@create')->name('products.create');
    Route::post('/products', 'ProductController@store')->name('products.store');
    Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');
    Route::put('/products/{product}', 'ProductController@update')->name('products.update');
    Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');
});
Route::get('/products/category/{category}', 'ProductController@indexByCategory')->name('products.category.index');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

// Users
Route::get('/profile/{user}', 'ProfileController@show')->name('profile.show');
Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
    Route::put('/profile/{user}', 'ProfileController@update')->name('profile.update');
});
// Admin
Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

// For testing roles
Route::get('/test', 'HomeController@index')->name('test');