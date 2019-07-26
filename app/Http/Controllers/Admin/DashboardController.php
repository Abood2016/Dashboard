<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = new User();
        $order = new Order();
        $product = new Product();
        return view('admin.dashboard',compact('user','order','product'));
    }

   
}
