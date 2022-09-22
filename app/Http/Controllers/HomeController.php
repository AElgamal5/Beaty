<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Models\Admin;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    //     $this->middleware('guest:admin');
    //     $this->middleware('guest:chef');
    // }

    public function index()
    {
        return view('index');
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $ContactUs = ContactUs::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);

        $admins = Admin::all();
        foreach ($admins as $admin){
            $details = ['title' => $ContactUs->subject, 'name' => $ContactUs->name, 'body' => $ContactUs->maeesage];
            $subject = "Customer feedback";
            Mail::to($admin->email)->send(new AdminEmail($details, $subject));
        }

        return redirect()->back()->withSuccess('Request send Successfully');
    }
}
