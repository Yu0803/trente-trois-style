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
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            AccessorySeeder::class,
            BagSeeder::class,
            UserSeeder::class,
            PaymentSeeder::class, 
        ]);
    }
}