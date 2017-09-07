<?php

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
    return view('welcome');
});
<<<<<<< HEAD
Route::get('login',function(){
	return view('login');
=======

Route::get('login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('products', function () {
    return view('products');
});

Route::get('furniture', function () {
    return view('furniture');
});

Route::get('single', function () {
    return view('single');
});

Route::get('short-codes', function () {
    return view('short-codes');
});

Route::get('mail', function () {
    return view('mail');
});

Route::get('checkout', function () {
    return view('checkout');
>>>>>>> fc1f0f40890f617296b52f908aa8e5f3809a06b1
});
