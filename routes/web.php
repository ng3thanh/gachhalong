<?php

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
});
    
Route::middleware('admin')->domain('admin.' . env('APP_DOMAIN'))->namespace('Admin')->group(function () {
    
});

