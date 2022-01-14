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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/subscribe/{id}', 'SubscribeController@checkout')->name('subscribe');
Route::post('/subscribe/{id}', 'SubscribeController@process')->name('subscribe');

Route::resource('plans', 'PlansController');
Route::resource('downloads', 'DownloadsController');
Route::resource('subscriptions', 'SubscriptionsController');
Route::resource('invoices', 'InvoicesController');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function () {
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    Route::resource('/downloads', 'DownloadsController', ['except' => ['show']]);
});
