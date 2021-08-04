<?php

namespace App\Http\Controllers\Auth\Canteen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Canteen;
class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.canteens.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:canteens'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
       
         Canteen::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }
}
