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
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminPaymentController;


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
Route::get('/home', function () {
    return view('home');
})->name('home');
// --------------------
// 商品一覧・詳細ページ
// --------------------
Route::get('/products/{category?}', [ProductController::class, 'index'])->name('products.index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('products.show');

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
// カートに追加
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

// カートを表示
Route::get('/cart', [CartController::class, 'show'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');


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



// =======================
// Adminトップページ
// =======================
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');


// =======================
// Adminダッシュボード画面
// =======================
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});


// =======================
// Adminログアウト
// =======================
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('/admin/login');
})->name('logout'); 


// =======================
// Admin各管理ページへの遷移ルート
// =======================
Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show'); // 詳細ページ用
});

// =======================
// Admin logout page
// =======================
Route::post('/admin/logout', function () {
    Auth::guard('admin')->logout();
    return redirect('/admin/login');
})->name('admin.logout');


// =======================
// Admin product management page
// =======================
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index'); 

    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('admin.products.store');

    // 編集関連ルート
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');
    // 削除
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');


    Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/reviews', [ReviewController::class, 'index'])->name('admin.reviews.index');
});


});

// =======================
// Admin payment management page
// =======================
Route::prefix('admin')->group(function () {
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
});





    




