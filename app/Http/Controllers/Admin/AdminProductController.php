<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\AdminProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // ページネーションするなら → Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
    return view('admin.products.create');
    }


    public function store(Request $request)
        {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('products', 'public'); // ← image に変更
        }


        Product::create($validated); // ← Productモデルを使って保存

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
        }


    public function edit($id)
    {
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
    }


    public function destroy(Product $product)
    {
        //画像ファイルが存在するか確認してから削除
    if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
        Storage::disk('public')->delete($product->image_path);
    }

    // 商品データの削除
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

}