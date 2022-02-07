<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Auth;
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

Route::group([
    'as' => 'main.',
], function () {
    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::get('/tentang-kami', [MainController::class, 'about'])->name('about');

    Route::get('/apartemen', [MainController::class, 'apartment'])->name('apartment');

    Route::get('/ulasan', [MainController::class, 'review'])->name('review');

    Route::get('/faq', [MainController::class, 'faq'])->name('faq');

    Route::get('/kontak', [MainController::class, 'contact'])->name('contact');
});

Auth::routes(['verify' => false]);

Route::get('/images/banner/{imageName}', [MediaController::class, 'getBannerImage'])->name('getBannerImage');
Route::get('/videos/banner/{videoName}', [MediaController::class, 'getBannerVideo'])->name('getBannerVideo');
Route::get('/images/products/{imageName}', [MediaController::class, 'getProductImage'])->name('getProductImage');
Route::get('/files/catalogue/{catalogueName}', [MediaController::class, 'getCatalogue'])->name('getCatalogue');