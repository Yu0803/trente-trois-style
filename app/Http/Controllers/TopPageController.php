<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class TopPageController extends Controller
{
    public function index()
    {
        // 新着商品（カテゴリが「new」の中から新しい順に4件）
        $newArrivals = Product::whereHas('categories', function ($query) {
            $query->where('name', 'new');
        })
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        // 一番売れている商品を Top Sellers に出す（注文数が多い順に4件）
        $topProducts = Product::with('categories')
            ->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*')
            ->selectRaw('SUM(order_items.quantity) as total_sold')
            ->groupBy('products.id')
            ->orderByDesc('total_sold')
            ->take(4)
            ->get();

        
        return view('top', compact('newArrivals', 'topProducts'));
    }
}
