<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function () {
    Route::get('', 'index')->name('home')->middleware('auth');  
    Route::get('login', 'login')->name('login')->middleware('guest');  
    Route::post('authenticate', 'authenticate')->name('authenticate')->middleware('guest');  
    Route::post('logout', 'logout')->name('logout')->middleware('auth');;  
});

Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->group(function  () {
        Route::get('product', 'index')->name('product.index');  
        Route::get('product/create', 'create')->name('product.create');  
        Route::post('product/store', 'store')->name('product.store');  
        Route::get('product/edit/{product}', 'edit')->name('product.edit');  
        Route::post('product/update/{product}', 'update')->name('product.update');  
        Route::post('product/delete/{product}', 'delete')->name('product.delete'); 
    });

    Route::controller(OrderController::class)->group(function  () {
        Route::get('order', 'index')->name('order.index');  
        Route::get('order/create', 'create')->name('order.create');  
        Route::post('order/store', 'store')->name('order.store');  
        Route::post('order/delete/{order}', 'delete')->name('order.delete'); 
    });
});