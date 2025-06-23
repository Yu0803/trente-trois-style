<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class BagSeeder extends Seeder
{
    public function run(): void
    {
        // カテゴリ取得（'Bag' が登録されている必要あり）
        $bagCategory = Category::where('slug', 'bag')->first();

        if (!$bagCategory) {
            echo "❌ 'Bag' カテゴリが見つかりません。先に CategorySeeder を実行してください。\n";
            return;
        }

        // 商品一覧
        $bags = [
            ['name' => 'Bag 1', 'price' => 100, 'image' => 'products/bag1.png'],
            ['name' => 'Bag 2', 'price' => 100, 'image' => 'products/bag2.png'],
            ['name' => 'Bag 3', 'price' => 100, 'image' => 'products/bag3.png'],
            ['name' => 'Bag 4', 'price' => 100, 'image' => 'products/bag4.png'],
            ['name' => 'Bag 5', 'price' => 100, 'image' => 'products/bag5.png'],
            ['name' => 'Bag 6', 'price' => 100, 'image' => 'products/bag6.png'],
            ['name' => 'Bag 7', 'price' => 100, 'image' => 'products/bag7.png'],
            ['name' => 'Bag 8', 'price' => 100, 'image' => 'products/bag8.png'],
            ['name' => 'Bag 9', 'price' => 100, 'image' => 'products/bag9.png'],
            ['name' => 'Bag 10', 'price' => 100, 'image' => 'products/bag10.png'],
            ['name' => 'Bag 11', 'price' => 100, 'image' => 'products/bag11.png'],
            ['name' => 'Bag 12', 'price' => 100, 'image' => 'products/bag12.png'],
        ];

        // 登録
        foreach ($bags as $data) {
            $product = Product::firstOrCreate([
                'name' => $data['name'],
                'price' => $data['price'],
                'image' => $data['image'],
                'description' => $data['name'] . ' for weddings.',
                'stock' => 10,
            ]);

            $product->categories()->syncWithoutDetaching([$bagCategory->id]);
        }

        echo "✅ Bagカテゴリの商品がSeederで登録されました。\n";
    }
}
