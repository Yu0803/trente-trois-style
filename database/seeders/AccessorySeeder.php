<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class AccessorySeeder extends Seeder
{
    public function run(): void
    {
        // カテゴリ取得
        $category = Category::where('slug', 'accessory')->first();

        if (!$category) {
            echo "❌ accessory category not found. Please run the CategorySeeder before executing this seeder.\n";
            return;
        }

        // 商品一覧
        $products = [
            ['name' => 'Accessory 1', 'price' => 100, 'image' => 'products/accessories1.png'],
            ['name' => 'Accessory 2', 'price' => 100, 'image' => 'products/accessories2.png'],
            ['name' => 'Accessory 3', 'price' => 100, 'image' => 'products/accessories3.png'],
            ['name' => 'Accessory 4', 'price' => 100, 'image' => 'products/accessories4.png'],
            ['name' => 'Accessory 5', 'price' => 100, 'image' => 'products/accessories5.png'],
            ['name' => 'Accessory 6', 'price' => 100, 'image' => 'products/accessories6.png'],
            ['name' => 'Accessory 7', 'price' => 100, 'image' => 'products/accessories7.png'],
            ['name' => 'Accessory 8', 'price' => 100, 'image' => 'products/accessories8.png'],
            ['name' => 'Accessory 9', 'price' => 100, 'image' => 'products/accessories9.png'],
            ['name' => 'Accessory 10', 'price' => 100, 'image' => 'products/accessories10.png'],
            ['name' => 'Accessory 11', 'price' => 100, 'image' => 'products/accessories11.png'],
            ['name' => 'Accessory 12', 'price' => 100, 'image' => 'products/accessories12.png'],
        ];

        foreach ($products as $data) {
            // ファイル存在チェック（任意：開発中に役立ちます）
            $imagePath = storage_path('app/public/' . $data['image']);
            if (!file_exists($imagePath)) {
                echo "⚠️ Image not found: " . $imagePath . "\n";
                continue;
            }

            // 商品作成
            $product = Product::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'image' => $data['image'], // 例: 'products/accessories1.png'
            ]);

            // カテゴリ紐付け
            $product->categories()->attach($category->id);
        }

        echo "✅ Accessory category products have been successfully seeded.\n";
    }
}
