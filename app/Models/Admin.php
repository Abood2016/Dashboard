<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Product;
class Admin extends Authenticatable
{
    protected $fillable = ['name','email','password','description','age','address','username','facebook','twitter'];

    protected $hidden = [
        'password', 'remember_token',
    ];

     public function product()
    {
        return $this->hasMany(Product::class);
    }
}
