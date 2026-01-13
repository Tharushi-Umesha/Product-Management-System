<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::post('/products', [ProductController::class, 'store']);
Route::get('/categories', [ProductController::class, 'getCategories']);
