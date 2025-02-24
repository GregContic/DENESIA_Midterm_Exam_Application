<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Main page showing all themes
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Show products for a specific theme
Route::get('/products/{theme}', [ProductController::class, 'showProducts'])->name('products.show');

Route::get('/', function () {
    return view('welcome');
});
