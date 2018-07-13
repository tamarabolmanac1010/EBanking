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

Route::get('/home', function () {
    return view('home');
});

Route::get('/transactions', function () {
    return view('transactions');
});

Route::get('/pay', function () {
    return view('pay');
});

Route::post('/pay/submit', 'PayingController@submit');


