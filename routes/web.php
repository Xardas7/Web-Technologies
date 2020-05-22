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

Route::options('/{path}', function(){
    return '';
})->where('path', '.*');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/checkout', function () {
    return view('checkout');
})->middleware('auth');

Route::get('/category', function () {
    return view('category');
});

Route::post('/confermation', 'OrdersController@store')->middleware('auth');

Route::get('/tracking', function () {
    return view('tracking');
})->middleware('auth');

Route::get('/generic', function () {
    return view('generic');
});

Route::get('/elements', function () {
    return view('elements');
});



Route::get('/payments', function(){
    return view('checkout-payment');
})->middleware('auth');


// ---------- Addresses -----------//
Route::name('address.')->prefix('address')->group(function(){
    Route::post('/', 'AddressController@store_from_checkout');
    Route::post('/save', 'AddressController@store');
    Route::get('/{id?}/edit','AddressController@edit')->name('edit');
    Route::post('/{id}/update', 'AddressController@update')->name('update');
});

// ---------- Wishlist -----------//
Route::name('wishlist')->prefix('wishlist')->group(function(){
    Route::get('/', 'WishListController@index')->name('index');
    Route::post('/', 'WishListController@store')->name('store');
    Route::get('/delete/{id}', 'WishListController@delete')->name('delete');
    Route::post('/delete/all', 'WishListController@deleteAll')->name('deleteAll');
    Route::post('/add/all', 'WishListController@addAll')->name('addAll');
});
    
// ---------- Shopping Cart -----------//
Route::name('cart.')->prefix('cart')->group(function(){
    Route::get('/', 'ShoppingCartController@indexByUser');
    Route::post('/', 'ShoppingCartController@store')->name('store');
});

// ---------- Orders -----------//
Route::name('order.')->prefix('order')->group(function(){
});


// ---------- Products -----------//
Route::get('/{gender}-clothing', 'ProductController@index')->name('product.index');
Route::get('/{gender}-clothing/{name}', 'ProductController@index_name')->name('product.index_name');
Route::get('/{gender}-clothing/{name}/{type}', 'ProductController@index_type')->name('product.index_name_type');
Route::get('{name}', 'ProductController@show')->name('product.show');
Route::post('/comment', 'CommentController@store')->name('product.comment');

// -- USER -- //
Route::name('user.')->prefix('user')->group(function(){
Route::get('/settings','UserController@settings')->name('settings');
Route::get('/orders','UserController@orders')->name('orders');
});
