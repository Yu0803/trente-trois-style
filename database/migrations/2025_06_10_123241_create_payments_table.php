<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // 主キー
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID (外部キー)
            $table->foreignId('order_id')->nullable()->constrained()->onDelete('set null'); // 注文ID (外部キー、nullableは必要に応じて)
            $table->decimal('amount', 10, 2); // 支払い金額 (decimalで精度を保つ)
            $table->string('currency', 3); // 通貨 (例: JPY, USD)
            $table->string('payment_method'); // 支払い方法 (例: credit_card, bank_transfer, paypal)
            $table->string('transaction_id')->nullable()->unique(); // 決済サービスからのトランザクションID (ユニーク)
            $table->string('status')->default('pending'); // 支払いステータス (pending, completed, failed, refundedなど)
            $table->timestamp('paid_at')->nullable(); // 支払いが完了した日時
            $table->timestamps(); // created_at と updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};