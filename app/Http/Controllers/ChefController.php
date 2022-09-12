<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChefController extends Controller
{
    public function login_index(Request $request){
        return view('chef/login_index');
    }

    public function login(Request $request){
        $user = Chef::query()->where('email', '=', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $request->session()->put('adminID', $user->id);
            return redirect('chef/dashboard');
        }
    }

    public function index(Request $request){
        return view('chef/dashboard');
    }

    public function display_accepted_orders(Request $request){
        $chef_id = session()->get('chef_id');
        $orders = Order::query()->where('chef_id', '=', $chef_id)->get();
        return view('chef/display_accepted_orders', compact('orders'));
    }

    public function accept_order(Request $request){
        $order_id = $request->order_id;
        $chef_id = session()->get('chef_id');
        $check = Order::query()->where('chef_id', '=', $chef_id)->count();
        if(! ($check > 3)){
            $order = Order::query()->where('id', '=', $order_id)->first();
            $order->chef_id = session()->get('chef_id');
            $order->save();
        }
    }

    public function display_not_accepted_orders(Request $request){
        $chef_id = session()->get('chef_id');
        $orders = Order::query()->whereNot('chef_id', '=', $chef_id)->get();
        return view('chef/display_not_accepted_orders', compact('orders'));
    }

    public function mark_order_done(Request $request){
        $order_id = $request->order_id;
        $order = Order::query()->where('order_id', '=', $order_id)->get();
        $order->status = 1;
        $order->save();
        return back()->withSuccess('You have Successfully loggedin');
    }
}
