<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
        $this->middleware('guest:chef');
        $this->middleware('guest');
    }

    public function login()
    {
        return view('admin.login');
    }
    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect()->route('admin.login')->withErrors('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('login');
        }
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
