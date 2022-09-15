<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChefController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login_index()
    {
        return view('chef.login_index');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (Auth::guard('chef')->attempt($request->only('email', 'password'))) {
            return redirect()->route('chef.index')
                ->withSuccess('You have Successfully loggedin');
        }
        return redirect()->route('chef.login_index')->withErrors('Oppes! You have entered invalid credentials');
    }

    public function logout()
    {
        if (!Auth::guard('chef')->check()) {
            return redirect()->route('chef.login_index');
        }
        Auth::guard('chef')->logout();
        return redirect()->route('chef.login_index');
    }

    public function register_index()
    {
        return view('chef.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:chefs,email',
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
        $user = new Chef();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->photo = $profileImage;
        $user->save();
        $request->session()->put('chef_id', $user->id);
        return redirect()->route('chef.login_index');
    }

    public function index(Request $request)
    {
        $data = Chef::query()->where('id', '=', session()->get('chef_id'))->first();
        $chef_id = session()->get('chef_id');
        // $accepted_orders = Order::query()->where('chef_id', '=', $chef_id)->get();
        $accepted_orders = Order::query()->where('chef_id', '=', $chef_id)->simplePaginate(5, ['*'], 'acceptedOrders');
        // $orders = Order::where('chef_id', '=', NULL)->get();
        $orders = Order::where('chef_id', '=', NULL)->simplePaginate(5, ['*'], 'orders');
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
        $check = Order::query()->where('chef_id', '=', $chef_id)->where('status', '=', 0)->count();
        // dd($check);
        if ($check < 3) {
            $order = Order::query()->where('id', '=', $order_id)->first();
            $order->chef_id = session()->get('chef_id');
            $order->save();
            return redirect()->back()->withSuccess('Order Accepted');
        }
        return redirect()->back()->withErrors('Can\'t more than 3 orders!');
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
        $order = Order::query()->where('id', '=', $order_id)->get();
        $order[0]->status = 1;
        $order[0]->save();
        return back()->withSuccess('Makred as Done');
    }

    public function profile()
    {
        return view('chef.profile');
    }

    public function profileEdit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'phone' => 'required|string',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        $chef = Chef::find($id);
        $chef->name = $request->input('name');
        $chef->email = $request->input('email');
        if ($request->input('password') != NULL) {
            $chef->password = bcrypt($request->input('password'));
        }
        $chef->phone = $request->input('phone');
        $chef->address = $request->input('address');
        if ($request->file('photo') != NULL) {
            // dd('fol');
            $image = $request->file('photo');
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            if (File::exists(public_path('images/' . $chef->photo))) {
                File::delete(public_path('images/' . $chef->photo));
            }
            $chef->photo = $profileImage;
        }
        $chef->save();
        return redirect()->back()->withSuccess('Data changed Successfully');
    }
}
