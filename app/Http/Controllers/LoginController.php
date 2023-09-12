<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            if ($credentials['email'] === 'admin@gmail.com' && $credentials['password'] === 'admin123') {

                $request->session()->regenerate();

                return redirect()->intended('dashboard');
            }

            $request->session()->regenerate();

            return redirect()->intended('products');
        }

        return redirect('/login')->with('failed', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
