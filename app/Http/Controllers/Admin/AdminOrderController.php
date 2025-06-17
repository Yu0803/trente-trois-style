<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->input('keyword');

    $orders = \App\Models\Order::with('user')
        ->when($keyword, function ($query, $keyword) {
            $query->whereHas('user', function ($q) use ($keyword) {
                $q->where('name', 'like', "%{$keyword}%")
                  ->orWhere('email', 'like', "%{$keyword}%");
            })->orWhere('status', 'like', "%{$keyword}%");
        })
        ->latest()
        ->paginate(10);

    return view('admin.orders.index', compact('orders'));
}

public function destroy($id)
{
    $order = \App\Models\Order::findOrFail($id);
    $order->delete();

    return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully.');
}

}
