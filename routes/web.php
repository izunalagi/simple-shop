<?php

use App\Http\Controllers\Public\ProductController;
use App\Http\Middleware\EnsureAuthCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home.index');
})->name('home.index');

// Route::get('/home', function() {
//     return view('home.index');
// })->name('home.index');


Route::middleware(EnsureAuthCustomer::class)->group(function () {
Route::prefix('product')->name('product.')->group(function () {
Route::get('/',[ProductController::class,'index'])->name('index');
});
});

//welcome
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//post
Route::get('/post',[PostController::class,'index'])->name('post.index');
Route::get('/post/create',[PostController::class,'create'])->name('post.create');
Route::post('/post/store',[PostController::class,'store'])->name('post.store');
Route::get('/post/edit/{id}', [PostController::class,'edit'])->name('post.edit');
Route::put('/post/update/{id}', [PostController::class,'update'])->name('post.update');
Route::post('/post/destroy/{id}', [PostController::class,'destroy'])->name('post.destroy');

//category
Route::get('/category', [CategoryController::class,'index'])->name('category.index');
Route::get('/category/detail/{id}', [CategoryController::class,'detail'])->name('category.detail');
// Route::get('/category/create', [CategoryController::class,'create'])->name('category.create');
