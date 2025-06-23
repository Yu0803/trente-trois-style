<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class CleanDuplicateProducts extends Command
{
    protected $signature = 'clean:duplicates';

    protected $description = 'Remove duplicate Bag products (Bag 1 to Bag 9) from the database';

    public function handle()
    {
        // Bag 1〜Bag 9 だけを対象にする
        $targetNames = [];

        for ($i = 1; $i <= 9; $i++) {
            $targetNames[] = "Bag $i";
        }

        foreach ($targetNames as $name) {
            $duplicates = Product::where('name', $name)->get();

            if ($duplicates->count() > 1) {
                $this->info("🧹 Cleaning duplicates for: {$name}");

                $duplicates->skip(1)->each(function ($product) {
                    $product->categories()->detach(); // 中間テーブルも削除
                    $product->delete();
                });
            } else {
                $this->line("✅ No duplicates for: {$name}");
            }
        }

        $this->info("🎉 Duplicate cleanup complete.");
    }
}
