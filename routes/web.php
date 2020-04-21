<?php

Route::get('/cart', function () {
    return view('cart');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/checkout', function () {
    return view('checkout');
});
Route::get('/confermation', function () {
    return view('confermation');
});
Route::get('/generic', function () {
    return view('generic');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/single', function () {
    return view('single');
});
Route::get('/tracking', function () {
    return view('tracking');
});
Route::get('/elements', function () {
    return view('elements');
});
Route::get('/', function () {
    return view('index');
}); ?>
