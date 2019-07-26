<?php

namespace App\Models;
use\App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{

	protected $fillable = [
        'product_size'
    ];

    public function Products()
    {
    	return $this->hasMany(Product::class);
    }
}
