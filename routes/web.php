<?php

use App\Card;
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

/**
 * Admin routes
 */
Route::get('/admin','Admin\MainController@index');
/**
 * Admin users
 */
Route::get('/admin/users','Admin\UsersController@index')->name('users.index');
Route::post('/admin/user/delete','Admin\UsersController@delete');
Route::get('/admin/user/new','Admin\UsersController@create');
Route::post('/admin/user/store','Admin\UsersController@store');
Route::post('/admin/user/update','Admin\UsersController@update');
Route::get('/admin/user/{id}/edit','Admin\UsersController@edit');
/**
 * Admin product
 */
Route::get('/admin/products','Admin\ProductsController@index')->name('admin.product.index');
Route::post('/admin/product/delete','Admin\ProductsController@delete');
Route::get('/admin/product/new','Admin\ProductsController@create');
Route::post('/admin/product/store','Admin\ProductsController@store')->name('admin.product.store');;
Route::post('/admin/product/update','Admin\ProductsController@update')->name('admin.product.update');
Route::get('/admin/product/{id}/edit','Admin\ProductsController@edit');
Route::get('/admin/product/{id}/details','Admin\ProductsController@details');
/**
 * Admin address
 */
Route::get('/admin/addresses','Admin\AddressesController@index')->name('admin.address.index');
Route::post('/admin/address/delete','Admin\AddressesController@delete');
Route::get('/admin/address/new','Admin\AddressesController@create');
Route::post('/admin/address/store','Admin\AddressesController@store')->name('admin.address.store');;
Route::post('/admin/address/update','Admin\AddressesController@update')->name('admin.address.update');
Route::get('/admin/address/{id}/edit','Admin\AddressesController@edit');


/**
 * Admin cards
 */
Route::get('/admin/cards','Admin\CardsController@index')->name('admin.card.index');
Route::post('/admin/card/delete','Admin\CardsController@delete');
Route::get('/admin/card/new','Admin\CardsController@create');
Route::post('/admin/card/store','Admin\CardsController@store')->name('admin.card.store');;
Route::post('/admin/card/update','Admin\CardsController@update')->name('admin.card.update');
Route::get('/admin/card/{id}/edit','Admin\CardsController@edit');
/**
 * Admin orders
 */
Route::get('/admin/orders','Admin\OrdersController@index')->name('admin.order.index');
Route::post('/admin/order/delete','Admin\OrdersController@delete');
Route::get('/admin/order/new','Admin\OrdersController@create');
Route::post('/admin/order/store','Admin\OrdersController@store')->name('admin.order.store');;
Route::post('/admin/order/update','Admin\OrdersController@update')->name('admin.order.update');
Route::get('/admin/order/{id}/edit','Admin\OrdersController@edit');

/**
 * Other admin routs
 */
Route::get('/admin/elements', function(){
    return view('admin.elements');
});
Route::get('/admin/panels', function(){
    return view('admin.panels');
});
Route::get('/admin/widgets', function(){
    return view('admin.widgets');
});
Route::get('/admin/charts', function(){
    return view('admin.charts');
});
Route::get('/admin/login', function(){
    return view('admin.login');
});
Route::get('/admin/new_user', function(){
    return view('admin.forms.user.new_user');
});


Route::get('/payments', 'OrdersController@payment_checkout')->middleware('auth');


// ---------- Addresses -----------//
Route::name('address.')->prefix('address')->group(function(){
    Route::post('/', 'AddressController@store_from_checkout');
    Route::get('/create', 'AddressController@create')->name('create');
    Route::post('/save', 'AddressController@store')->name('store');
    Route::get('/{id}/edit','AddressController@edit')->name('edit');
    Route::post('/{id}/update', 'AddressController@update')->name('update');
    Route::delete('/{id}/delete', 'AddressController@delete')->name('delete');
});

// ---------- Wishlist -----------//
Route::name('wishlist.')->prefix('wishlist')->group(function(){
    Route::get('/', 'WishListController@index')->name('index');
    Route::post('/', 'WishListController@store')->name('store');
    Route::get('/delete/{id}', 'WishListController@delete')->name('delete');
    Route::post('/delete/all', 'WishListController@deleteAll')->name('deleteAll');
    Route::post('/add/all', 'WishListController@addAll')->name('addAll');
});

// ---------- Shopping Cart -----------//
Route::name('cart.')->prefix('cart')->group(function(){
    Route::get('', 'ShoppingCartController@indexByUser');
    Route::post('/add', 'ShoppingCartController@store')->name('store');
    Route::post('/refresh-quantity', 'ShoppingCartController@refresh_quantity')->name('refresh-quantity');
});

// ---------- Orders -----------//
Route::name('order.')->prefix('order')->group(function(){
});

// -- USER -- //
Route::name('user.')->prefix('user')->group(function(){
    Route::post('/update/{id}', 'UserController@update')->name('update');
    Route::get('/settings','UserController@settings')->name('settings');
    Route::get('/orders','UserController@orders')->name('orders');
});

// -- CARDS -- //
Route::name('card.')->prefix('card')->group(function() {
    Route::get('/create', 'CardController@create')->name('create');
    Route::post('/save', 'CardController@store')->name('store');
    Route::get('/{id}/edit', 'CardController@edit')->name('edit');
    Route::post('/{id}/update', 'CardController@update')->name('update');
    Route::delete('/{id}/delete', 'CardController@delete')->name('delete');
});
// ---------- Products -----------//

    Route::get('/{gender}-clothing', 'ProductController@index')->name('product.index');
    Route::get('/{gender}-clothing/{name}', 'ProductController@index_name')->name('product.index_name');
    Route::get('/{gender}-clothing/{name}/{type}', 'ProductController@index_type')->name('product.index_name_type');
    Route::post('/comment', 'CommentController@store')->name('product.comment');
    Route::get('{name}', 'ProductController@show')->name('product.show');

