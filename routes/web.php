<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HistoryController;

// Route ke Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route ke ProductController
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.detail');
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');


// Staff
Route::prefix('staff')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/{id}', [StaffController::class, 'show'])->name('staff.show');
    Route::get('/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::put('/{id}', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/{id}', [StaffController::class, 'destroy'])->name('staff.destroy');
});


// Order History
Route::prefix('history')->group(function () {
    Route::get('/', [HistoryController::class, 'index'])->name('history.index');
    Route::delete('/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');
    // Tambahkan route show jika diperlukan
    Route::get('/{id}', [HistoryController::class, 'show'])->name('history.show');
});