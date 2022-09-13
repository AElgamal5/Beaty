<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Chef;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function dashboard()
    {
        $usersNo = User::count();
        $chefNo = Chef::count();
        $adminNo = Admin::count();
        $orderNo = Order::count();
        return view('admin.dashboard', ['usersNo' => $usersNo, 'chefNo' => $chefNo, 'adminNo' => $adminNo, 'orderNo' => $orderNo]);
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', ['users' => $users]);
    }

    public function usersEdit($id)
    {
        $user = User::where('id', '=', $id)->get();
        return view('admin.usersEdit', ['user' => $user[0]]);
    }

    public function usersEditPost(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->route('admin.users');
    }

    public function userDelete($id)
    {
        User::find($id)->delete();
        return redirect()->back();
    }

    public function userAdd()
    {
        return view('admin.userAdd');
    }

    public function userAddPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
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
        return redirect()->back();
    }

    public function chefs()
    {
        $chefs = Chef::all();
        return view('admin.chefs', ['chefs' => $chefs]);
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', ['orders' => $orders]);
    }
}
