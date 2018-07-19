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

Route::get('/transactions', 'TransactionController@index');

Route::get('/pay', function () {
    return view('pay');
});

Route::get('', function () {
    return view('auth/login');
});

Route::post('/pay/submit', 'PayingController@submit');

Route::post('/transactions/submit', 'TransactionController@submit');

Route::get('/acTypes', 'PayingController@getAccountTypes');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

