<?php

namespace App\Models;
use\App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        'color_name', 'color'
    ];

}
