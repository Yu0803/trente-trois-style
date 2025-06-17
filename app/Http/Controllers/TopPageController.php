<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class TopPageController extends Controller
{
    public function index()
    {
        // 「new」カテゴリーのIDを取得
        $newCategory = Category::where('name', 'new')->first();
        $topCategory = Category::where('name', 'top')->first();

        $newArrivals = $newCategory ? $newCategory->products()->take(8)->get() : collect();
        $topSellers = $topCategory ? $topCategory->products()->take(5)->get() : collect();

        return view('top', compact('newArrivals', 'topSellers'));
    }
}
