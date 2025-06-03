<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TopPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| ここでは、ユーザーがアクセスできるWebルートを定義します。
| コメントを機能ごとにまとめて、他の開発者も理解しやすいようにしています。
*/


// =======================
// トップページ
// =======================
Route::get('/', function () {
    return view('welcome');
});


// =======================
// 認証（ログイン / 新規登録）
// =======================

// ログイン画面表示／ログイン処理
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// 新規登録画面表示／登録処理
// 作成者：SAKAI（フロント＋バック両方対応）
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// --------------------
// 商品一覧・詳細ページ
// --------------------
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // 商品一覧ページ
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // 商品詳細ページ

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');



// =======================
// 注文処理・履歴表示
// =======================

// 注文履歴ページ（開発確認用）
Route::get('/order-history', [OrderController::class, 'history']);

// 商品注文保存（購入ボタンからPOST）
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

// 決済成功画面（注文後にリダイレクト）
Route::get('/payment-success', [OrderController::class, 'showPaymentSuccess'])->name('payment.success');


// =======================
// その他ページ
// =======================

// ホーム画面（ログイン後などに使用）
Route::get('/home', [HomeController::class, 'index'])->name('home');


// 仮のカートページ表示用（動作確認のために使用）
// Temporary cart page for testing order submission
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

// アバウトページ（チーム紹介など）
Route::get('/about', function () {
    return view('about');
})->name('about');

//Top page
Route::get('/', [TopPageController::class, 'index']);



//contact-us
// Contactページ表示
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
// フォーム送信処理
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
