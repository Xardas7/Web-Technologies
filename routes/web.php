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

Route::get('/', function () {
    return view('index');
});

// Route::get('/prova',function(){
//     $scarpe_sizes = App\Category::where('name','Abbigliamento')
//     ->where('type','Giacche e cappotti')
//     ->where('gender','female')
//     ->first();
//     $product = App\Product::find(1);
//     $product->category()->associate($scarpe_sizes)->save();
//     dd($scarpe_sizes);
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'ProductController@index')->name('product.index');
Route::get('/products/{product}', 'ProductController@show')->name('product.show');

Route::get('/single', function () {
    return view('single');
});
