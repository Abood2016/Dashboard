<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Localizationcontroller extends Controller
{
   public function change($lang = 'en')
   {
        Session::put('local',$lang);
        return redirect()->back();
   }
}
