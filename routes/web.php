<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/products', ProductController::class);
Route::get('/insert', [ProductController::class, 'insert']);
Route::get('/update/{id}', [ProductController::class, 'update']);
Route::get('/delete/{id}', [ProductController::class, 'delete']);
Route::get('/edit', [ProductController::class, 'edit']);
Route::get('/destroy', [ProductController::class, 'destroy']);