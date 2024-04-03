<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = DB::table('pengguna')->where('email', $request->email)->first();

        if ($user) {
            if ($request->password == $user->password) {
                return redirect()->intended('/dashboard'); 
            } else {
                return back()->withErrors(['password' => 'Password salah'])->withInput();
            }
        }

        return back()->withErrors(['email' => 'Email tidak terdaftar'])->withInput();
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/home');
    }
}

