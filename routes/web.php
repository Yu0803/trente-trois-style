<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/order-history', [OrderController::class, 'history']);
