<?php

namespace App\Models;
use\App\Models\Admin;
use\App\Models\Category;
use\App\Models\Color;
use\App\Models\Size;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use SoftDeletes;
    protected $fillable=['name','price','long_description',
    'short_description','SKU',
    'slug','category_id','admin_id','size','size_id','status','image'];

    protected $dates = ['deleted_at'];

     public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

     public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class,'product_color','product_id','color_id');
    }


    public function Size() {
        return $this->belongsTo(Size::class);
    }


}
