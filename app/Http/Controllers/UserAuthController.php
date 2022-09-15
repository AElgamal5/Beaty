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
        return view('user.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard')
                ->withSuccess('You have Successfully logged in');
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
        return view('user.register');
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $profileImage = NULL;
        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
        }
        // dd($profileImage);
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'photo' => $profileImage,
        ]);
        return redirect()->route('login')->withSuccess('You have Successfully registerd');
    }
}
