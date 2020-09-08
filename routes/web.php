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

Route::get('/privacy-policy', 'HomeController@privacyPolicy')->name('home');
Route::get('/term-condition', 'HomeController@termCondition')->name('home');
Route::get('/contact-us', 'HomeController@contactUs')->name('home');
Route::get('/about-us', 'HomeController@aboutUs')->name('home');

Route::get('/district-list/{id}', 'HomeController@districtList');
Route::get('/profile', 'HomeController@profile');
Route::post('/profile', 'HomeController@updateProfile');

Route::resource('lottery', 'ProductController');
Route::resource('winner', 'WinnerController');
Route::resource('donate', 'DonationController');

// Post Route For Makw Payment Request
Route::post('payment', 'TransactionController@payment')->name('payment');

Route::get('/change-password', 'HomeController@changePassword');
Route::post('/change-password', 'HomeController@updatePassword');

Route::get('/user-bat/create', 'HomeController@userBat');
Route::get('/user-winner/create', 'HomeController@userWinner');

Route::get('/cart', 'CartController@cart')->name('cart.index');
Route::post('/add', 'CartController@add')->name('cart.store');
Route::post('/update', 'CartController@update')->name('cart.update');
Route::post('/remove', 'CartController@remove')->name('cart.remove');
Route::post('/clear', 'CartController@clear')->name('cart.clear');

Route::get('/single-cart/{id}', 'CartController@addCart');

