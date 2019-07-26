<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use\App\Models\User;
use\App\Models\OrderItem;
use\App\Models\Product;
class Order extends Model
{
    protected $guarded = [];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function OrderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
        
    public function products()
    {
        return $this->belongsToMany(Product::class,'order_items');
    }
}
