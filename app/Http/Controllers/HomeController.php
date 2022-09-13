<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
