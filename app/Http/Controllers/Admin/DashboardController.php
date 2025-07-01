<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{


    public function index(Request $request)
    {
        $filter = $request->query('filter', 'today'); // デフォルトは "today"
        $query = Order::with('user');

        // 🔍 フィルターごとの条件分岐
        if ($filter === 'today') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($filter === 'yesterday') {
            $query->whereDate('created_at', Carbon::yesterday());
        } elseif ($filter === 'week') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
        } elseif ($filter === 'month') {
            $query->whereMonth('created_at', Carbon::now()->month);
        }

        // 🔁 並び順は共通（降順）
        $orders = $query->orderBy('created_at', 'desc')->take(10)->get();

        return view('admin.dashboard', compact('orders', 'filter'));
    }
}
