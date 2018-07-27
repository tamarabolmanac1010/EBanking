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



Route::get('/homeAdmin', function () {
    return view('homeAdmin');
});

Route::get('transactions', 'TransactionController@index');

Route::get('pay', 'PayingController@index');

Route::get('add', 'AdminController@addUser');

Route::get('users', 'AdminController@users');

Route::get('newNotification', 'NotificationController@newNotification');

Route::post('notification', 'NotificationController@createNotification');

Route::get('notifications', 'NotificationController@userNotifications');

Route::get('edit/{id}', 'UserController@editProfile');

Route::get('view/{id}', 'UserController@viewProfile');

Route::post('saveChanges', 'UserController@saveChanges');

Route::get('', function () {
    return view('auth/login');
});

Route::get('/admin', 'AdminController@admin')
    ->middleware('is_admin')
    ->name('admin');

Route::post('payment', 'PayingController@payment');

Route::post('submit', 'TransactionController@submit');

Route::get('/acTypes', 'PayingController@getAccountTypes');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('test',function () {
    return view('test');
});

