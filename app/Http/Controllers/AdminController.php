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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'address' => 'required|string'
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'phone' => 'required|string',
            'address' => 'required|string'
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

    public function chefsEdit($id)
    {
        $chef = Chef::where('id', '=', $id)->get();
        return view('admin.chefsEdit', ['chef' => $chef[0]]);
    }

    public function chefsEditPost(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:chefs,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5'
        ]);

        $chef = Chef::find($id);
        $chef->name = $request->input('name');
        $chef->email = $request->input('email');
        $chef->phone = $request->input('phone');
        $chef->address = $request->input('address');
        $chef->rating = $request->input('rating');
        $chef->save();
        return redirect()->route('admin.chefs');
    }

    public function chefsDelete($id)
    {
        Chef::find($id)->delete();
        return redirect()->back();
    }

    public function chefsAdd()
    {
        return view('admin.chefsAdd');
    }

    public function chefsAddPost(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:chefs,email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5'
        ]);
        Chef::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'rating' => $request->input('rating'),
        ]);
        return redirect()->route('admin.chefs');
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function ordersEdit($id)
    {
        $order = Order::where('id', '=', $id)->get();
        return view('admin.ordersEdit', ['order' => $order[0]]);
    }

    public function ordersEditPost(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|numeric|min:1|exists:users,id',
            'chef_id' => 'nullable|numeric|min:1|exists:chefs,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'status' => 'required|numeric|min:0|max:2'
        ]);

        $order = Order::find($id);
        $order->user_id = $request->input('user_id');
        $order->chef_id = $request->input('chef_id');
        $order->title = $request->input('title');
        $order->description = $request->input('description');
        $order->price = $request->input('price');
        $order->status = $request->input('status');
        $order->save();

        return redirect()->route('admin.orders');
    }

    public function ordersDelete($id)
    {
        Order::find($id)->delete();
        return redirect()->back();
    }

    public function ordersAdd()
    {
        return view('admin.ordersAdd');
    }

    public function ordersAddPost(Request $request)
    {
        $request->validate([
            'user_id' => 'required|numeric|min:1|exists:users,id',
            'chef_id' => 'nullable|numeric|min:1|exists:chefs,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1',
            'status' => 'required|numeric|min:0|max:2'
        ]);

        Order::create([
            'user_id' => $request->input('user_id'),
            'chef_id' => $request->input('chef_id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.orders');
    }
}
