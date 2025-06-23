<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['New', 'Dress', 'Accessory', 'Pumps', 'Bag', 'Items', 'Bouquet'];

        foreach ($categories as $name) {
            Category::firstOrCreate(
                ['slug' => Str::slug($name)],  // 検索キー
                ['name' => $name]              // なければこの値で作成
            );
        }
    }
}
