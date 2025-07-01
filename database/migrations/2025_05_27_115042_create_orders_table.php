<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // 誰の注文か
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // 合計金額（priceよりも "amount" や "total" が慣例的）
            $table->integer('amount');

            // 注文ステータス（例: pending, completed, cancelled）
            $table->string('status')->default('pending');

            // 支払い方法（例: credit_card, paypal など）
            $table->string('payment_method')->nullable();

            // 注文内容のメモや説明など
            $table->string('description')->nullable();

            // 注文日
            $table->dateTime('order_date')->nullable();

            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
