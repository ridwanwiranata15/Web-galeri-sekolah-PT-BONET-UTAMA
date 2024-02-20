<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password'=> Hash::make($request->password)
        ]);
        return redirect()->route('admin.category.index');
    }
    public function signin(Request $request)
    {
       if(Auth::attempt([
            'email' => $request->email,
            'password'=> $request->password
       ])){
           return redirect()->route('admin.category.index');
       }else{
        return redirect()->back();
    }

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

