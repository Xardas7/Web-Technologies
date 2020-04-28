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

Route::get('/prova',function(){
    $user = App\Service::where('permission','all')->first()->id;
    dd($user);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/products', 'SingleController@index');
Route::get('/products/{product}', 'SingleController@show');

Route::get('/single', function () {
    return view('single');
});
