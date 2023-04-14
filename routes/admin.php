<?php

//product

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureAuthAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureAuthAdmin::class)->group(function () {
    Route::get('/product', [ProductController::class,'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::post('/product/destroy/{id}', [ProductController::class,'destroy'])->name('product.destroy');

    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::get('/post/create',[PostController::class,'create'])->name('post.create');
    Route::post('/post/store',[PostController::class,'store'])->name('post.store');
    Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('post.edit');
    Route::put('/post/update/{id}', [PostController::class,'update'])->name('post.update');
    Route::post('/post/destroy/{id}', [PostController::class,'destroy'])->name('post.destroy');

    //category
    Route::get('/category', [CategoryController::class,'index'])->name('category.index');
    Route::get('/category/detail/{id}', [CategoryController::class,'detail'])->name('category.detail');


});
