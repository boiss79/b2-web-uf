<?php

use Illuminate\Support\Facades\Auth;
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
    Route::get('/storage/products/{filename}', 'ProductController@download')->name('products.file.download');
});
Route::get('/products/category/{category}', 'ProductController@indexByCategory')->name('products.category.index');
Route::get('/products/{product}', 'ProductController@show')->name('products.show');

// Cart
Route::get('/cart', 'CartController@index')->name('cart.index');
Route::post('/cart-add', 'CartController@add')->name('cart.add');
Route::post('/cart-remove', 'CartController@remove')->name('cart.remove');
Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');

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

    // Purchases
    Route::get('/profile/purchases', 'UserController@showPurchases')->name('users.purchases.show');

    // Comments
    Route::get('/comments', 'ProductCommentController@index')->name('users.comments.index');
});
Route::get('/profile/{user}', 'UserController@showProfile')->name('users.profile.show');

// Messages
Route::get('/contact', 'MessageController@create')->name('contact.create');
Route::post('/contact/store', 'MessageController@store')->name('contact.store');

// Payment
Route::middleware('auth')->group(function () {
    Route::get('/payment', 'PaymentController@prepare')->name('payment.prepare');
    Route::get('/check-payment', 'PaymentController@checkPayment')->name('payment.check');
});

// Orders
Route::get('/orders', 'OrderController@index')->name('orders.index')->middleware('auth');

// Comments
Route::middleware('auth')->group(function () {
    Route::get('/products/{product}/comments/create', 'ProductCommentController@create')->name('products.comments.create');
    Route::post('/products/{product}/comments', 'ProductCommentController@store')->name('products.comments.store');
    Route::get('/products/{product}/comments/edit', 'ProductCommentController@edit')->name('products.comments.edit');
    Route::put('/products/{product}/comments', 'ProductCommentController@update')->name('products.comments.update');
    Route::delete('/comments/{comment}/delete', 'ProductCommentController@destroy')->name('products.comments.destroy');
});

// -----------------
//      ADMIN
// -----------------

Route::group(['middleware' => 'role:admin|moderator'], function () {
    Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');
    Route::get('/admin/comments', 'Admin\CommentController@index')->name('admin.comments.index');
    Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');

    // Products
    Route::get('/admin/products', 'Admin\ProductController@index')->name('admin.products.index');
    Route::get('/admin/products/{product}', 'Admin\ProductController@show')->name('admin.products.show');
    Route::put('/admin/products/{product}', 'Admin\ProductController@update')->name('admin.products.update');
    Route::delete('/admin/products/{product}', 'Admin\ProductController@destroy')->name('admin.products.destroy');

    // Categories
    Route::get('/admin/categories', 'Admin\ProductCategoryController@index')->name('admin.categories.index');
    Route::get('/admin/categories/create', 'Admin\ProductCategoryController@create')->name('admin.categories.create');
    Route::post('/admin/categories', 'Admin\ProductCategoryController@store')->name('admin.categories.store');
    Route::get('/admin/categories/{category}', 'Admin\ProductCategoryController@edit')->name('admin.categories.edit');
    Route::put('/admin/categories/{category}', 'Admin\ProductCategoryController@update')->name('admin.categories.update');
    Route::delete('/admin/categories/{category}', 'Admin\ProductCategoryController@destroy')->name('admin.categories.destroy');

    // Messages
    Route::get('/admin/messages', 'Admin\MessageController@index')->name('admin.messages.index');
    Route::get('/admin/messages/{message}', 'Admin\MessageController@show')->name('admin.messages.show');
    Route::group(['middleware' => 'role:admin'], function () {
        Route::delete('/admin/messages/{message}', 'Admin\MessageController@destroy')->name('admin.messages.destroy');
    });

    // Users
    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('/admin/users', 'Admin\UserController@index')->name('admin.users.index');
        Route::delete('/admin/users/{user}', 'Admin\UserController@destroy')->name('admin.users.destroy');
    });
});
