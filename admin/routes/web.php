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

Route::get('/', 'UserController@index');

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
Route::get('/add-product', 'ProductController@addView')->name('product.add');
Route::get('/add-donation', 'DonationController@addDonation')->name('donation.add');
Route::resource('user', 'UserController');
Route::resource('product', 'ProductController');
Route::resource('winner', 'WinnerController');
Route::resource('donate', 'DonationController');
Route::get('/district-list/{id}', 'DonationController@districtList');
Route::get('/change-password', 'AdminController@changePassword')->name('change-password');
Route::post('/change-password', 'AdminController@updatePassword')->name('change-password');

Route::get('/statistic', 'HomeController@statistic')->name('statistic');
Route::get('/live-player', 'HomeController@livePlayer')->name('statistic');
Route::post('/lottery', 'WinnerController@lottery')->name('statistic');
Route::get('/statistic/create', 'WinnerController@statisticCreate')->name('statistic');
Route::get('click-lottery/{start}/{end}', 'HomeController@clickLottery')->name('statistic');
Route::get('calculation', 'HomeController@calculation')->name('calculation');

Route::post('search-calucation', 'HomeController@searchCalculation')->name('calculation');

Route::get('/user-bat/create/{id}', 'UserController@userBat');
Route::get('/user-winner/create/{id}', 'UserController@userWinner');
