<?php

use App\Http\Controllers\viewOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/dashboard', [viewOrder::class, 'index']);

Route::get('/dashboard', [dashboardController::class, 'index']);
