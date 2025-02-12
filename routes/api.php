<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

Route::get('/list', [ProductController::class, 'index'])->name('listProductAPI');
Route::post('/list', [ProductController::class, 'store'])->name('createProductAPI');
Route::put('/list', [ProductController::class, 'update'])->name('updateProductAPI');
Route::delete('/list', [ProductController::class, 'destroy'])->name('deleteProductAPI');