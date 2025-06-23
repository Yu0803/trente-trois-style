<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ドレス12着を登録！
        //     Product::insert([
        //         [
        //             'name' => 'Coral Dress',
        //             'price' => 6800,
        //             'image' => '/images/dress1.jpg',
        //             'description' => 'Elegant coral dress for weddings.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Green Dress',
        //             'price' => 5400,
        //             'image' => '/images/dress2.jpg',
        //             'description' => 'Stylish green gown with lace.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Blue Dress',
        //             'price' => 5800,
        //             'image' => '/images/dress3.jpg',
        //             'description' => 'Classic blue dress with tulle.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Purple Dress',
        //             'price' => 5000,
        //             'image' => '/images/dress4.jpg',
        //             'description' => 'Flowy and dreamy purple gown.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Green Tea Dress',
        //             'price' => 6200,
        //             'image' => '/images/dress5.jpg',
        //             'description' => 'Chic green tea dress for celebrations.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'White Dress',
        //             'price' => 6200,
        //             'image' => '/images/dress6.jpg',
        //             'description' => 'Pure white wedding dress.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Pink Dress',
        //             'price' => 6800,
        //             'image' => '/images/dress7.jpg',
        //             'description' => 'Romantic pink wedding dress.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Dark Green Dress',
        //             'price' => 5400,
        //             'image' => '/images/dress8.jpg',
        //             'description' => 'Deep green elegant gown.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Sky Blue Dress',
        //             'price' => 5800,
        //             'image' => '/images/dress9.jpg',
        //             'description' => 'Dreamy sky blue dress.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Ocean Mist Dress',
        //             'price' => 5000,
        //             'image' => '/images/dress10.jpg',
        //             'description' => 'Elegant ocean mist dress.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Red Dress',
        //             'price' => 6200,
        //             'image' => '/images/dress11.jpg',
        //             'description' => 'Bold red dress for statement looks.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //         [
        //             'name' => 'Orange Dress',
        //             'price' => 6200,
        //             'image' => '/images/dress12.jpg',
        //             'description' => 'Cheerful orange dress for summer.',
        //             'category' => 'Dress',
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ],
        //     ]);


        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            
            
        ]);

        $this->call(AccessorySeeder::class);
        $this->call(BagSeeder::class);
        $this->call([
        UserSeeder::class,
        ]);

        $this->call(UserSeeder::class);
    }
}
