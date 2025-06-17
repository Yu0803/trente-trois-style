<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['new', 'dress', 'accessory', 'pumps', 'bags', 'items', 'bouquet'];
        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }
}