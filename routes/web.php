<?php

use Illuminate\Support\Facades\Route;
/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::middleware('guest')->domain(env('APP_DOMAIN'))->namespace('Web')->group(function () {
    Route::get('/', 'MainController@index')->name('main');
    
    Route::prefix('gioi_thieu')->group(function () {
        Route::get('/danh_sach', 'IntroduceController@index')->name('introduce');
    });
    
    Route::prefix('san_pham')->group(function () {
        Route::get('/danh_sach', 'ProductController@index')->name('product');
        Route::get('chi_tiet_san_pham/{id}', 'ProductController@show')->name('product_detail')->where('id', '[0-9]+');
    });

    Route::prefix('tai_lieu')->group(function () {
        Route::get('/danh_sach', 'DocumentController@index')->name('document');
    });
    
    Route::prefix('lien_he')->group(function () {
        Route::get('/danh_sach', 'ContactController@index')->name('contact');
    });
});
    
Route::middleware('admin')->domain('admin.' . env('APP_DOMAIN'))->namespace('Admin')->group(function () {
    
});

