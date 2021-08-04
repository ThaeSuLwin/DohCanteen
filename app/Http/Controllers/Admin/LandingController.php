<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\{Category,Order};
class LandingController extends Controller
{


      public function landing()
      {
        $count = Order::all()->count();
        session()->put('count', $count);
        $orders = Order::all();
        session()->put('orders',$orders);
        // dd(session()->get('orders'));
        return view('admins.landing');
      }


      public function getlanguage($val){
        session()->put('lang',$val);
        return redirect()->back();
      }

}
