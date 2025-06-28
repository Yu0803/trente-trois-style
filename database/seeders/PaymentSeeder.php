<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Str;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        Payment::create([
            'user_id' => 1,  // ← Customer Managementの "Test User"
            'order_id' => 1,
            'amount' => 15000,
            'currency' => 'USD',
            'payment_method' => 'credit_card',
            'transaction_id' => Str::uuid(),
            'status' => 'completed',
            'paid_at' => now(),
        ]);

        Payment::create([
            'user_id' => 6, // ← "Dino King"
            'order_id' => 2,
            'amount' => 28000,
            'currency' => 'JPY',
            'payment_method' => 'paypal',
            'transaction_id' => Str::uuid(),
            'status' => 'pending',
            'paid_at' => now()->subDays(1),
        ]);
    }
}