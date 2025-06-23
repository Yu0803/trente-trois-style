<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class TopPageController extends Controller
{
    public function index()
    {
        // 「new」カテゴリーの商品
        $newCategory = Category::where('name', 'new')->first();
        $newArrivals = $newCategory ? $newCategory->products()->take(4)->get() : collect();

        // 一番売れている商品を Top Sellers に出す
        $topProducts = Product::with('categories')
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->select('products.*')
            ->selectRaw('SUM(order_product.quantity) as total_sold')
            ->groupBy('products.id')
            ->orderByDesc('total_sold')
            ->take(3)
            ->get();

        return view('top', compact('newArrivals', 'topProducts'));
    }
}
