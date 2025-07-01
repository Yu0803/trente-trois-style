<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function show()
    {
        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('checkout', compact('cart', 'total'));
    }

    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        $user = Auth::user(); // ログインユーザー

        if (empty($cart)) {
            return redirect()->back()->with('error', 'カートが空です');
        }

        // 合計金額計算
        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // 1. 注文を保存
        $order = Order::create([
            'user_id' => $user ? $user->id : null,
            'amount' => $total,
            'description' => 'Checkout Order',
        ]);

        // 2. 注文に含まれる商品（order_items）を保存
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        // 3. カートをクリア
        session()->forget('cart');

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('payment-success');
    }
}
