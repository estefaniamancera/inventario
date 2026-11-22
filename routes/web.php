<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController; 

Route::get('/', function () {
    return redirect()->route('products.index');
});

// Registra el recurso de productos
Route::resource('products', ProductController::class)->except(['show']);


Route::resource('categories', CategoryController::class)->except(['show']);