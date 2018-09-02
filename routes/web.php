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

Route::group(['middleware' => ['authorization']], function () {


    Route::get('/homeAdmin', function () {
        return view('homeAdmin');
    });

    Route::get('transactions', 'TransactionController@index');

    Route::get('transfer', 'TransactionController@transferAmount');

    Route::post('submit', 'TransactionController@submit');

    Route::post('executeTransfer', 'TransactionController@executeTransfer');

    Route::get('pay', 'PayingController@index');

    Route::post('payment', 'PayingController@payment');

    Route::get('/acTypes', 'PayingController@getAccountTypes');


    Route::get('addUser', 'AdminController@addUser');

    Route::get('users', 'AdminController@users');


    Route::get('newNotification', 'NotificationController@newNotification')->middleware('authorization');

    Route::post('notification', 'NotificationController@createNotification');

    Route::get('notifications/{accN}', 'NotificationController@userNotifications');

    Route::get('sentNotifications', 'NotificationController@sentNotifications');

    Route::get('deleteNotification/{id}/{accN}', 'NotificationController@deleteNotification');


    Route::get('view/{id}', 'UserController@viewProfile');

    Route::get('edit/{id}', 'UserController@editProfile');

    Route::get('view/{id}', 'UserController@viewProfile');

    Route::post('saveChanges', 'UserController@saveChanges');

    Route::post('registerUser', 'UserController@registerUser');

    Route::get('searchUser','UserController@searchUser');


});

    Route::post('searchcontent', 'NotificationController@searchcontent');

    Route::get('', function () {
        return view('auth/login');
    });

    Route::get('/admin', 'AdminController@admin')
        ->middleware('is_admin')
        ->name('admin');

    Auth::routes();

    Route::get('home', 'HomeController@index')->name('home');

    Route::get('test',function () {
        return view('test');
    });





