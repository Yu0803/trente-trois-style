<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    // 必要な属性のみ代入許可
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        // 'categories' は中間テーブルでattachするので不要
    ];

    // オーダーとの多対多
    public function orders()
    {
        // 中間テーブルに timestamps がある場合のみ withTimestamps をつける
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    // カテゴリとの多対多
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    
}
