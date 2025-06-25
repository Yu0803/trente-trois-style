<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // 固定のユーザーレビュー（rating修正済み）
        $emily = User::where('email', 'emily@example.com')->first();
        if ($emily) {
            Review::create([
                'user_id' => $emily->id,
                'product_id' => Product::inRandomOrder()->first()->id,
                'rating' => 5,
                'comment' => 'Absolutely beautiful dress!',
            ]);
        }

        $sarah = User::where('email', 'sarah@example.com')->first();
        if ($sarah) {
            Review::create([
                'user_id' => $sarah->id,
                'product_id' => Product::inRandomOrder()->first()->id,
                'rating' => 4,
                'comment' => 'Loved the fit and quality',
            ]);
        }

        $michael = User::where('email', 'michael@example.com')->first();
        if ($michael) {
            Review::create([
                'user_id' => $michael->id,
                'product_id' => Product::inRandomOrder()->first()->id,
                'rating' => 4,
                'comment' => 'Good value for the price',
            ]);
        }

        // fakerでランダムレビュー（ratingは4〜5限定）
        $users = User::all();
        $products = Product::whereDoesntHave('categories', function ($q) {
            $q->where('name', 'new');
        })->get();

        foreach ($products as $product) {
            for ($i = 0; $i < 3; $i++) {
                $user = $users->random();

                if (!Review::where('user_id', $user->id)->where('product_id', $product->id)->exists()) {
                    Review::create([
                        'product_id' => $product->id,
                        'user_id'    => $user->id,
                        'rating'     => rand(4, 5), // ★ ここで制限
                        'comment'    => $faker->sentence(),
                    ]);
                }
            }
        }
    }
}
