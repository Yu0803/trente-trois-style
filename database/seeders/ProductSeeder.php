<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // カテゴリ "dress" を取得（事前にCategorySeederで登録されている前提）
        $dressCategory = Category::where('slug', 'dress')->first();

        if (!$dressCategory) {
            echo "❌ Dress category not found. Please run the CategorySeeder before executing this seeder.\n";
            return;
        }

        // ドレス商品一覧（画像ファイル名に合わせる）
        $products = [
            ['name' => 'Pink Dress', 'price' => 400, 'image' => 'products/dress1.jpg'],
            ['name' => 'Green Dress', 'price' => 400, 'image' => 'products/dress2.jpg'],
            ['name' => 'Blue Dress', 'price' => 400, 'image' => 'products/dress3.jpg'],
            ['name' => 'Purple Dress', 'price' => 400, 'image' => 'products/dress4.jpg'],
            ['name' => 'Turquoise Dress', 'price' => 500, 'image' => 'products/dress5.jpg'],
            ['name' => 'White Dress', 'price' => 600, 'image' => 'products/dress6.jpg'],
            ['name' => 'Mermaid Pink Dress', 'price' => 600, 'image' => 'products/dress7.jpg'],
            ['name' => 'Mermaid Green Dress', 'price' => 600, 'image' => 'products/dress8.jpg'],
            ['name' => 'Mermaid Blue Dress', 'price' => 600, 'image' => 'products/dress9.jpg'],
            ['name' => 'Mermaid White Dress', 'price' => 600, 'image' => 'products/dress10.jpg'],
            ['name' => 'Bouquet Red Dress', 'price' => 600, 'image' => 'products/dress11.jpg'],
            ['name' => 'Bouquet Pink Dress', 'price' => 700, 'image' => 'products/dress12.jpg'],
        ];

        foreach ($products as $data) {
            $product = Product::create([
                'name' => $data['name'],
                'price' => $data['price'],
                'image' => $data['image'],
                'description' => $data['name'],
                'stock' => 10, // 任意：在庫数
            ]);

            // dressカテゴリと関連付け（中間テーブル）
            $product->categories()->attach($dressCategory->id);
        }

        echo "✅ Dress category products have been successfully seeded.\n";
    }
}
