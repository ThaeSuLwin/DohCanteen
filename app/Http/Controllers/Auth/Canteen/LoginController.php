<?php

namespace App\Http\Controllers\Auth\Canteen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Canteen;
use Auth;
class LoginController extends Controller
{

   

    public function showLoginForm()
    {
       
        return view('auth.canteens.login');
    }

    public function login()
    {
        $id = auth()->guard('canteen')->id();
        // dd('HI');
        dd($id);
    }
}
