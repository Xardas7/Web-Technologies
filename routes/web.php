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
Route::post('/admin/user/joinparty','Admin\UsersController@joinparty');
Route::post('/admin/user/leaveparty','Admin\UsersController@leaveparty');
Route::get('/admin/user/{id}/edit','Admin\UsersController@edit');
/**
 * Admin party
 */
Route::get('/admin/parties','Admin\PartiesController@index')->name('admin.party.index');
Route::post('/admin/party/delete','Admin\PartiesController@delete');
Route::get('/admin/party/new','Admin\PartiesController@create');
Route::post('/admin/party/store','Admin\PartiesController@store')->name('admin.party.store');;
Route::post('/admin/party/update','Admin\PartiesController@update')->name('admin.party.update');
Route::get('/admin/party/{id}/edit','Admin\PartiesController@edit');
/**
 * Admin bans
 */
Route::get('/admin/bans','Admin\BansController@index')->name('admin.ban.index');
Route::post('/admin/ban/delete','Admin\BansController@delete');
Route::get('/admin/ban/new','Admin\BansController@create');
Route::post('/admin/ban/store','Admin\BansController@store')->name('admin.ban.store');;
Route::post('/admin/ban/update','Admin\BansController@update')->name('admin.ban.update');
Route::get('/admin/ban/{id}/edit','Admin\BansController@edit');

Route::get('/admin/totalban','Admin\BansController@indextotalban');
Route::post('/admin/totalban/store','Admin\BansController@totalban');
Route::post('/admin/totalban/delete','Admin\BansController@totalunban');


/**
 * Admin votes
 */
Route::get('/admin/votes','Admin\VotesController@index')->name('admin.vote.index');
Route::post('/admin/vote/delete','Admin\VotesController@delete');
Route::get('/admin/vote/new','Admin\VotesController@create');
Route::post('/admin/vote/store','Admin\VotesController@store')->name('admin.vote.store');;
Route::post('/admin/vote/update','Admin\VotesController@update')->name('admin.vote.update');
Route::get('/admin/vote/{id}/edit','Admin\VotesController@edit');
/**
 * Admin kicks
 */
Route::get('/admin/kicks','Admin\KicksController@index')->name('admin.kick.index');
Route::post('/admin/kick/delete','Admin\KicksController@delete');
Route::get('/admin/kick/new','Admin\KicksController@create');
Route::post('/admin/kick/store','Admin\KicksController@store')->name('admin.kick.store');;
Route::post('/admin/kick/update','Admin\KicksController@update')->name('admin.kick.update');
Route::get('/admin/kick/{id}/edit','Admin\KicksController@edit');

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

