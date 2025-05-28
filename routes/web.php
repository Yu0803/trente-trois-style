<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;
Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Route::get('/order-history', [OrderController::class, 'history']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route for the user registration page (GET: show form, POST: handle registration)
// Created by CHIAKI SAKAI - handles frontend + backend of register page
// ユーザー登録ページのルーティング
// GET: フォーム表示、POST: 登録処理を実行
// 作成者：CHIAKI SAKAI（フロント＋バック両方対応）

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
