<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- Make sure Auth is imported
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/admin/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/admin/product', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/admin/product/{id}', [ProductController::class, 'update'])->name('products.update');
});

Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

