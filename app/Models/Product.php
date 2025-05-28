<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order; // ← これを追加！

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'image'];

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
