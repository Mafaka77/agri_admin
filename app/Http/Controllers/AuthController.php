<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return inertia('LoginPage');
    }

    public function login(Request $request)
    {
        $validate=$this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return to_route('dashboard');
        }
        return redirect()->back()->withErrors([
            'error'=>'The provided credentials do no match our records'
        ]);
    }
}
