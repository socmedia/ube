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
    'prefix' => 'admin/post',
    'middleware' => 'auth',
    'as' => 'adm.post.',
], function () {

    Route::group([
        'prefix' => 'jenis',
        'as' => 'type.',
    ], function () {
        Route::get('/', 'TypeController@index')->name('index');
    });

    Route::group([
        'prefix' => 'kategori',
        'as' => 'cetegory.',
    ], function () {
        Route::get('/', 'CategoryController@index')->name('index');
    });

    Route::group([
        'prefix' => 'status',
        'as' => 'status.',
    ], function () {
        Route::get('/', 'StatusController@index')->name('index');
    });

    Route::group([
        'prefix' => 'blog',
        'as' => 'blog.',
    ], function () {
        Route::get('/', 'BlogController@index')->name('index');
        Route::get('/tambah', 'BlogController@create')->name('create');
        Route::post('/tambah', 'BlogController@store')->name('store');
        Route::get('/edit/{id}', 'BlogController@edit')->name('edit');
        Route::put('/edit/{id}', 'BlogController@update')->name('update');
        Route::get('/check', 'BlogController@check')->name('check');
    });

    Route::group([
        'prefix' => 'proyek',
        'as' => 'project.',
    ], function () {
        Route::get('/', 'ProjectController@index')->name('index');
        Route::get('/tambah', 'ProjectController@create')->name('create');
        Route::post('/tambah', 'ProjectController@store')->name('store');
        Route::get('/edit/{id}', 'ProjectController@edit')->name('edit');
        Route::get('/galeri/{id}', 'ProjectController@gallery')->name('gallery');
        Route::put('/edit/{id}', 'ProjectController@update')->name('update');
        Route::get('/check', 'BlogController@check')->name('check');
    });

    Route::post('/image/upload', 'PostController@upload')->name('image.upload');
});
