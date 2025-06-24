<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emily   = User::where('email', 'emily@example.com')->first();
        $sarah   = User::where('email', 'sarah@example.com')->first();
        $michael = User::where('email', 'michael@example.com')->first();

        Order::create([
            'user_id' => $emily->id,
            'price' => 2000,
            'status' => 'Shipped',
            'created_at' => now(),
        ]);

        Order::create([
            'user_id' => $sarah->id,
            'price' => 1800,
            'status' => 'Pending',
            'created_at' => now(),
        ]);

        Order::create([
            'user_id' => $michael->id,
            'price' => 1200,
            'status' => 'Completed',
            'created_at' => now(),
        ]);
    }
}
