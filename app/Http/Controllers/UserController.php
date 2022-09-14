<?php

namespace App\Http\Controllers;

use App\Models\Chef;
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
        return view('user.dashboard', ['orders' => $orders]);
    }

    public function addOrder(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1'
        ]);

        Order::create([
            'user_id' => Auth::user()->id,
            'chef_id' => NULL,
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
        return redirect()->back()->withSuccess('Order added Successfully');
    }

    public function editOrderShow($id)
    {
        $order = Order::where('id', '=', $id)->get();
        //dd($order);
        return view('user.editOrder', ['order' => $order[0]]);
    }

    public function editOrder(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric|min:1'
        ]);
        // dd($id);
        Order::where('id', '=', $id)->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price')
        ]);
        return redirect()->route('dashboard')->withSuccess('Order edited Successfully');
    }

    public function deleteOrder($id)
    {
        $order = Order::where([['id', '=', $id]])->get();
        if ($order[0]->chef_id == NULL) {
            $order[0]->delete();
            return redirect()->back()->withSuccess('Order deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Order is preparing now!');
        }
    }

    public function profile($id)
    {
        $user = User::find($id);
        return view('user.profile', ['user' => $user]);
    }

    public function profileEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'phone' => 'required|string',
            'address' => 'required|string'
        ]);
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->input('password') != NULL) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->save();
        return redirect()->back()->withSuccess('Data changed Successfully');
    }

    public function chefOrder($chef_id)
    {
        $chef = Chef::where('id', '=', $chef_id)->get();
        return view('user.chefProfile', ['chef' => $chef[0]]);
    }

    public function rateOrder(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
        ]);
        $order = Order::find($id);
        $order->rating = $request->input('rating');
        $order->status = 2;
        $order->save();
        $chef = Chef::find($order->chef_id);
        $chef->rating = $request->input('rating');
        $chef->save();
        return redirect()->back()->withSuccess('Enjoy your meal!');
    }
}
