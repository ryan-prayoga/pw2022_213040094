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

Route::get('/', 'DashboardController@index')->name('dashboard');

Auth::routes();

Route::get('products/{id}/gallery', 'ProductController@gallery')
    ->name('product.gallery');
Route::resource('product', 'ProductController');

Route::resource('product-galleries', 'ProductGalleryController');

Route::get('transaction/{id}/set-status', 'TransactionController@setstatus')
    ->name('transaction.status');
Route::resource('transaction', 'TransactionController');
