<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // カテゴリ別の一覧表示
    public function index($category = null)
    {
        $products = $category
            ? Product::where('category', $category)->get()
            : Product::all();

        return view('products.index', compact('products', 'category'));
    }

    // 商品の詳細ページ
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
}


       

