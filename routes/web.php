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

Route::get('/online-ads', function () {
    return view('onlineads');
});
Route::get('/online-ads-update', function () {
    return view('onlineads_update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/program', 'ProgramController@program')->name('home');


