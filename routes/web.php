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

// Route::get('/prova',function(){
//     $scarpe_sizes = App\Category::where('name','Abbigliamento')
//     ->where('type','Giacche e cappotti')
//     ->where('gender','female')
//     ->first();
//     $product = App\Product::find(1);
//     $product->category()->associate($scarpe_sizes)->save();
//     dd($scarpe_sizes);
// });

/*Route::get('/welcome', function(){
    return view('welcome');
});*/

/*Route::get('/login2', function () {
    return view('login');
});*/
Auth::routes();

Route::options('/{path}', function(){
    return '';
})->where('path', '.*');

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/checkout', function () {
    return view('checkout');
})->middleware('auth');

Route::get('/category', function () {
    return view('category');
});

Route::get('/confermation', function () {
    return view('confermation');
})->middleware('auth');

Route::get('/tracking', function () {
    return view('tracking');
})->middleware('auth');

Route::get('/generic', function () {
    return view('generic');
});

Route::get('/elements', function () {
    return view('elements');
});

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/payments', function(){
    return view('checkout-payment');
})->middleware('auth');

Route::post('/address', 'AddressController@store');
Route::post('/address', 'AddressController@store_from_checkout');

Route::post('/comment', 'CommentController@store')->name('product.comment');

Route::get('/wishlist', 'WishListController@index')->name('wishlist.index');
Route::post('/wishlist', 'WishListController@store')->name('wishlist.store');
Route::get('/wishlist/delete/{id}', 'WishListController@delete')->name('wishlist.delete');
Route::post('/wishlist/delete/all', 'WishListController@deleteAll')->name('wishlist.deleteAll');
Route::post('/wishlist/add/all', 'WishListController@addAll')->name('wishlist.addAll');

Route::get('/cart', 'ShoppingCartController@indexByUser');
Route::post('/cart', 'ShoppingCartController@store')->name('cart.store');

Route::get('/orders','OrdersController@indexByUser')->name('user.orders');

Route::get('/user/settings','UserController@edit');

Route::get('/{gender}-clothing', 'ProductController@index')->name('product.index');
Route::get('/{gender}-clothing/{name}', 'ProductController@index_name')->name('product.index_name');
Route::get('/{gender}-clothing/{name}/{type}', 'ProductController@index_type')->name('product.index_name_type');
Route::get('{name}', 'ProductController@show')->name('product.show');
