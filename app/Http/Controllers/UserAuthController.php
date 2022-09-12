<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {
        return view('login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

        return redirect("login")->withErrors('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        return redirect()->route('login');
    }
}
