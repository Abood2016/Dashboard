<?php

namespace App\Models;
use\App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable=['name'];
    protected $dates = ['deleted_at'];

    public function Products()
    {
        return $this->hasMany(Product::class);
    }
}
