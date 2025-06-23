<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 商品一覧（全体またはカテゴリ指定）
    public function index($category = null)
    {
        if ($category) {
            $category = Category::where('slug', $category)->firstOrFail();
            // ここで新しい順に並べる
            $products = $category->products()->with('categories')->orderBy('created_at', 'desc')->paginate(12);
        } else {
            // ここも新しい順に
            $products = Product::with('categories')->orderBy('created_at', 'desc')->paginate(12);
            $category = null;
        }

        return view('products.index', compact('products', 'category'));
    }

    // 商品詳細
    public function show($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // 商品登録（Admin用）
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'categories' => 'required|array'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        $product = Product::create($validated);
        $product->categories()->attach($validated['categories']);

        return redirect()->route('products.index');
    }
}
