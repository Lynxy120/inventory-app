<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
// Route::resource('/products', ProductController::class);
// Route::get('/insert', [ProductController::class, 'insert']);
// Route::get('/update/{id}', [ProductController::class, 'update']);
// Route::get('/delete/{id}', [ProductController::class, 'delete']);
// Route::get('/edit', [ProductController::class, 'edit']);
// Route::get('/destroy', [ProductController::class, 'destroy']);
// Route::get('/create', [ProductController::class, 'create']);
// Route::post('/store', [ProductController::class, 'store']);
Route::resource('categories', CategoryController::class);