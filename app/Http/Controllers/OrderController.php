<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth'); 
    }

    public function history()
    {
        $user = auth()->user();

        if (!$user) {
            return redirect('/login')->with('error', 'Please log in.');
        }

        $orders = $user->orders()->with('products')->get();
        return view('orders.history', compact('orders'));
    }


    // 👇 支払い完了ページを表示するメソッド（追加）
    public function showPaymentSuccess()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/login')->with('error', 'Please log in.');
        }

        $order = Auth::user()->orders()->latest()->first();

        if (!$order) {
            return redirect('/')->with('error', 'No order history found.');
        }
        // ✅ [5/30] payment-success ページ内の表示用変数を
        //    `$order->items` → `$order->products` に変更しました。

        // 理由：Order モデルが products() というリレーションを持っているため。
        // 中間テーブルに quantity がある構成なので、items() は存在しません。

        return view('payment-success', [
            'order' => $order,
            'items' => $order->products,
        ]);
    }
    // 👇ここに追加する！！5/30 sakai
    //在庫減算表示機能を追加 6/21 tomoyama
    public function store(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Please log in.');
        }

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        foreach ($request->items as $item) {
            $product = Product::findOrFail($item['product_id']);

            // ✅ 在庫チェック
            if ($product->stock < $item['quantity']) {
                return redirect()->back()->with('error', 'Not enough stock available: ' . $product->name);
            }

            // ✅ 在庫を減らす
            $product->stock -= $item['quantity'];
            $product->save();

            // 注文と紐づけ（中間テーブルに quantity を保存）
            $order->products()->attach($item['product_id'], [
                'price' => $item['price'],
                'quantity' => $item['quantity'],
            ]);
        }

        return redirect()->route('payment.success');
    }
}
