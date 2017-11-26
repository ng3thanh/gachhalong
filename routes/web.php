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
    
    Route::prefix('gioi-thieu')->group(function () {
        Route::get('/danh-sach', 'IntroduceController@index')->name('introduce');
    });
    
    Route::prefix('san-pham')->group(function () {
        Route::get('/danh-sach/{slug}-{menu_id}', 'ProductController@index')->name('product');
        Route::get('{slug}-{id}', 'ProductController@show')->name('product_detail');
    });

    Route::prefix('tai-lieu')->group(function () {
        Route::get('/danh-sach', 'DocumentController@index')->name('document');
    });
    
    Route::prefix('lien-he')->group(function () {
        Route::get('/danh-sach', 'ContactController@index')->name('contact');
    });
});

Route::domain('admin.' . env('APP_DOMAIN'))->namespace('Admin')->group(function () {
    
    Route::middleware('admin')->group(function () {
        Route::get('/', 'DashBoardController@index')->name('dashboard');
        
        Route::resource('introduce', 'IntroduceController');
        Route::resource('product', 'ProductController');
        Route::resource('document', 'DocumentController');
        Route::resource('contact', 'ContactController');
    });
    
    Route::get('/login', 'LoginController@getLogin')->name('get_login');
    Route::post('/login', 'LoginController@postLogin')->name('post_login');
    
});

