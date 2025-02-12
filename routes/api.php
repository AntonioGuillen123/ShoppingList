<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Product;

Route::get('/list', [Product::class, 'index'])->name('listProductAPI');
Route::post('/list', [Product::class, 'store'])->name('createProductAPI');
Route::put('/list', [Product::class, 'update'])->name('updateProductAPI');
Route::delete('/list', [Product::class, 'destroy'])->name('deleteProductAPI');