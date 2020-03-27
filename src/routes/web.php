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
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile/edit', 'UserController@editProfile')->name('users.profile.edit');
    Route::put('/profile/edit', 'UserController@updateProfile')->name('users.profile.update');
    
    // Parameters
    Route::get('/settings', 'UserController@showSettings')->name('users.settings.show');
    Route::post('/settings', 'UserController@updatePassword')->name('users.settings.updatePassword');
    Route::put('/settings', 'UserController@updateEmail')->name('users.settings.updateEmail');
    Route::delete('/settings', 'UserController@destroy')->name('users.settings.destroy');
});
Route::get('/profile/{user}', 'UserController@showProfile')->name('users.profile.show');


// Admin
Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');

// For testing roles
Route::get('/test', 'HomeController@index')->name('test');