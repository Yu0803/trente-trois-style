<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order; 

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'description',
    'price',
    'stock',
    'image', 
];



    public function orders()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    public function categories()
    {
    return $this->belongsToMany(Category::class);
    }

}
