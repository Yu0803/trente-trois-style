<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;

class Order extends Model
{
    

    // ✅ Add withPivot to get quantity from the pivot table
    protected $fillable = [
        'user_id', 
        'status',
        'description',
        'payment_method',
        'amount',
        'order_date',
        'user_id',
];
    
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
