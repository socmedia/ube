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

Route::group([
    'prefix' => 'admin/apartemen',
    'middleware' => 'auth',
    'as' => 'adm.product.',
], function () {
    Route::get('/', 'ProductController@index')->name('index');
    Route::get('/gambar/{id}', 'ProductController@images')->name('images');
});