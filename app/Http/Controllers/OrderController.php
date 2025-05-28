<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

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


}

