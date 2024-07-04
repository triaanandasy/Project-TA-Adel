<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard'); // or wherever you want to redirect the user after login
        }
    }

    public function loginpage(){
        return view('auth.login');
    }

    public function dashboard(){
        return view('auth.dashboard');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->flush();
        return redirect()->route('login');
    }
}
