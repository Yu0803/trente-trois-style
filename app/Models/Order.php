<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;


class Order extends Model
{
    protected $fillable = ['user_id', 'status'];
    
    public function products()
{
    return $this->belongsToMany(Product::class)->withTimestamps();
}

public function user()
{
    return $this->belongsTo(User::class);
}

}
