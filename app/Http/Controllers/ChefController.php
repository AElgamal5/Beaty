<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChefController extends Controller
{
    public function login_index()
    {
        return view('chef.login_index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = Chef::query()->where('email', '=', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('chef_id', $user->id);
            return redirect('chef/dashboard');
        }
    }

    public function register_index()
    {
        return view('chef.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = Chef::query()->where('email', '=', $request->email)->first();
        if (!$user) {
            $user = new Chef();
            $user->email = $request->email;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->save();
            $request->session()->put('chef_id', $user->id);
            return redirect()->route('chef.login_index');
        }
    }

    public function index(Request $request)
    {
        $data = Chef::query()->where('id', '=', session()->get('chef_id'))->first();
        $chef_id = session()->get('chef_id');
        $accepted_orders = Order::query()->where('chef_id', '=', $chef_id)->get();
        $orders = Order::where('chef_id', '=', NULL)->get();
        //dd($orders);
        return view('chef/dashboard', compact('data', 'accepted_orders', 'orders'));
    }

    public function display_accepted_orders(Request $request)
    {
        $chef_id = session()->get('chef_id');
        $orders = Order::query()->where('chef_id', '=', $chef_id)->get();
        return view('chef/display_accepted_orders', compact('orders'));
    }

    public function accept_order(Request $request)
    {
        $order_id = $request->order_id;
        $chef_id = session()->get('chef_id');
        $check = Order::query()->where('chef_id', '=', $chef_id)->count();
        if (!($check > 3)) {
            $order = Order::query()->where('id', '=', $order_id)->first();
            $order->chef_id = session()->get('chef_id');
            $order->save();
        }
        return redirect()->back()->withSuccess('Order Accepted');
    }

    public function display_not_accepted_orders(Request $request)
    {
        $chef_id = session()->get('chef_id');
        $orders = Order::query()->whereNot('chef_id', '=', $chef_id)->get();
        return view('chef/display_not_accepted_orders', compact('orders'));
    }

    public function mark_order_done(Request $request)
    {
        $order_id = $request->order_id;
        $order = Order::query()->where('order_id', '=', $order_id)->get();
        $order->status = 1;
        $order->save();
        return back()->withSuccess('You have Successfully loggedin');
    }
}
