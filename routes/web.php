<?php

use App\Card;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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

Route::get('/checkout', 'OrdersController@checkout')->middleware('auth');

Route::get('/category', function () {
    return view('category');
});

Route::post('/store', 'OrdersController@store')->middleware('auth');
Route::get('/confermation/{order_id}', 'OrdersController@confermation')->middleware('auth');

Route::get('/tracking', function () {
    return view('tracking');
})->middleware('auth');

Route::get('/generic', function () {
    return view('generic');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::get('/search', 'ProductController@search');
/**
 * Admin routes
 */
Route::get('/admin','Admin\MainController@admin');

/**
 * Producer
 */
Route::get('/dashboard','Admin\MainProducerController@dashboard');
Route::get('/dashboard/product/new','Admin\MainProducerController@create');
Route::post('/dashboard/product/delete','Admin\MainProducerController@delete');
Route::post('/dashboard/product/store','Admin\MainProducerController@store');
Route::post('/dashboard/product/update','Admin\MainProducerController@update');
Route::get('/dashboard/product/{id}/edit','Admin\MainProducerController@edit');
Route::get('/dashboard/product/{id}/details','Admin\MainProducerController@details');
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
Route::get('/admin/product/new','Admin\ProductsController@create')->name('product.create');
Route::post('/admin/product/store','Admin\ProductsController@store')->name('admin.product.store');;
Route::post('/admin/product/{id}/update','Admin\ProductsController@update')->name('admin.product.update');
Route::get('/admin/product/{id}/edit','Admin\ProductsController@edit')->name('admin.product.edit');
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
Route::post('/admin/order/{id}/update','Admin\OrdersController@update')->name('admin.order.update');
Route::get('/admin/order/{id}/products','Admin\OrdersController@products')->name('admin.order.products');
Route::get('/admin/order/{id}/edit','Admin\OrdersController@edit');

Route::get('/admin/coupons','Admin\CouponsController@index')->name('admin.coupon.index');
Route::post('/admin/coupon/delete','Admin\CouponsController@delete');
Route::get('/admin/coupon/new','Admin\CouponsController@create');
Route::post('/admin/coupon/store','Admin\CouponsController@store');
Route::post('/admin/coupon/update','Admin\CouponsController@update');
Route::get('/admin/coupon/{id}/edit','Admin\CouponsController@edit');


Route::get('/admin/producers','Admin\ProducersController@index')->name('admin.producer.index');
Route::post('/admin/producer/delete','Admin\ProducersController@delete');
Route::get('/admin/producer/new','Admin\ProducersController@create');
Route::post('/admin/producer/store','Admin\ProducersController@store');
Route::post('/admin/producer/update','Admin\ProducersController@update');
Route::get('/admin/producer/{id}/edit','Admin\ProducersController@edit');

Route::get('/admin/categories','Admin\CategoriesController@index')->name('admin.category.index');
Route::post('/admin/category/{id}/delete','Admin\CategoriesController@delete');
Route::get('/admin/category/new','Admin\CategoriesController@create');
Route::post('/admin/category/store','Admin\CategoriesController@store');
Route::post('/admin/category/{id}/update','Admin\CategoriesController@update');
Route::get('/admin/category/{id}/edit','Admin\CategoriesController@edit');

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
    Route::get('', 'ShoppingCartController@indexByUser')->name('show');
    Route::post('/add', 'ShoppingCartController@store')->name('store');
    Route::post('/refresh-quantity', 'ShoppingCartController@refresh_quantity')->name('refresh-quantity');
    Route::delete('/product/{id}/delete', 'ShoppingCartController@deleteProduct')->name('product.delete');
});

// ---------- Orders -----------//
Route::name('order.')->prefix('order')->group(function(){
});

// -- Coupons -- //
    Route::get('/coupon', 'OrdersController@payment_checkout_with_coupon');

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

// ---- COMMENTS ----//

Route::name('comment.')->prefix('comment')->group(function(){
    Route::get('/{id}/like','CommentController@like')->name('like');
    Route::get('/{id}/dislike','CommentController@dislike')->name('dislike');
});
