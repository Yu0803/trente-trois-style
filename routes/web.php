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
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AdminOrderController;



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

Route::get('/products/bag', [\App\Http\Controllers\ProductController::class, 'index'])->name('products.bag');

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

// カートの数量を更新
Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');

// カートから商品を削除
Route::post('/cart/remove', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
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

// 最新投稿ページ
Route::get('/latest-posts', function () {
    return view('latest-posts');
})->name('latest-posts');

// ブログページ
Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get('/order-status', function () {
    return view('order-status');
})->name('order-status');

Route::get('/returns', function () {
    return view('returns');
})->name('returns');

Route::get('/size-guide', function () {
    return view('size-guide');
})->name('size-guide');

Route::get('/delivery', function () {
    return view('delivery');
})->name('delivery');

Route::get('/shipping-info', function () {
    return view('shipping-info');
})->name('shipping-info');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/special-offers', function () {
    return view('special-offers');
})->name('special-offers');

Route::get('/gift-cards', function () {
    return view('gift-cards');
})->name('gift-cards');

Route::get('/advertising', function () {
    return view('advertising');
})->name('advertising');

Route::get('/terms-of-use', function () {
    return view('terms-of-use');
})->name('terms-of-use');

// =======================
// Adminページ
// =======================
// Admin Login（ログイン前でもアクセス可能なルート）
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
});

// Admin 認証済みルート
Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Product Management
    Route::get('/products', [AdminProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [AdminProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [AdminProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [AdminProductController::class, 'destroy'])->name('products.destroy');

    // Order Management
    Route::resource('orders', AdminOrderController::class)->only(['index', 'destroy']);

    // Payment Management
    Route::get('/payments', [AdminPaymentController::class, 'index'])->name('payments.index');

    // Customer Management
    Route::get('/customers', [AdminCustomerController::class, 'index'])->name('customers.index');
    Route::delete('/customers/{user}', [AdminCustomerController::class, 'destroy'])->name('customers.destroy');

    // Review Management
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

