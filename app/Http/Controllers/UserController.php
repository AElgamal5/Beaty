<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $orders = Auth::user()->orders;
        return view('dashboard', ['orders' => $orders]);
    }

    public function addOrder(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:1'
        ]);

        Order::create([
            'user_id' => Auth::user()->id,
            'chef_id' => NULL,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return redirect()->back();
    }

    public function editOrderShow($id)
    {
        $order = Order::where('id', '=', $id)->get();
        //dd($order);
        return view('editOrder', ['order' => $order[0]]);
    }

    public function editOrder(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:1'
        ]);
        // dd($id);
        Order::where('id', '=', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
        return redirect()->route('dashboard');
    }

    public function deleteOrder($id)
    {
        // dd($id);
        Order::where([['id', '=', $id], ['chef_id', '=', NULL]])->delete();
        return redirect()->back();
    }
}
