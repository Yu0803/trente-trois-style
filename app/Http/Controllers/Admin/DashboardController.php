<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class DashboardController extends Controller
{


    public function index()
    {
        
         $orders = Order::latest()->get(); // オーダー一覧取得
        return view('admin.dashboard', compact('orders'));
    }

}
