<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\AdminProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;



class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('categories')->get(); // ← categories を事前読み込み
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:50000',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);


        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = $path;
        }

        // 商品を登録
        $productData = collect($validated)->except('categories')->toArray();
        $product = Product::create($productData);

        // カテゴリとの関係を保存
        $product->categories()->attach($validated['categories']);

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
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // 商品データの削除
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    // 商品データの更新
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:255',
            // 他のバリデーションが必要ならここに追加
        ]);

        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');
    }
}
