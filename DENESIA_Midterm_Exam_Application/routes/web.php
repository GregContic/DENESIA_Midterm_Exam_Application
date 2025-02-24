<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products/{theme}', [ProductController::class, 'showProducts']);


Route::get('/', function () {
    return view('welcome');
});
