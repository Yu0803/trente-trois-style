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
    // 開発確認用に全注文を取得
    $orders = \App\Models\Order::with('products')->get();
    return view('orders.history', compact('orders'));
}

 // 👇 支払い完了ページを表示するメソッド（追加）
    public function showPaymentSuccess()
    {
        // $order = Auth::user()->orders()->latest()->first();

        // if (!$order) {
        //     return redirect('/')->with('error', '注文履歴が見つかりませんでした。');
        // }

        // ✅ [5/30] payment-success ページ内の表示用変数を
        //    `$order->items` → `$order->products` に変更しました。

        // 理由：Order モデルが products() というリレーションを持っているため。
        // 中間テーブルに quantity がある構成なので、items() は存在しません。

        // return view('payment-success', [
        //     'order' => $order,
        //     'items' => $order->products,
        // ]);

        return view('payment-success');
    }

     // 👇ここに追加する！！5/30 sakai
    public function store(Request $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'user_id' => $user->id,
            'status' => 'pending',
        ]);

        foreach ($request->items as $item) {
            $order->products()->attach($item['product_id'], [
                'quantity' => $item['quantity']
            ]);
        }

        return redirect()->route('payment.success');
    }
}

