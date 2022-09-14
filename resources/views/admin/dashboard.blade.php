@extends('layouts.app')

@section('title', 'Admin dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="{{ Route('admin.users') }}" class="nav-link align-middle px-0">
                                <i class="fa fa-user text-success" aria-hidden="true"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Users</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('admin.chefs') }}" class="nav-link align-middle px-0">
                                <i class="fas fa-hamburger text-warning"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Chefs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ Route('admin.orders') }}" class="nav-link align-middle px-0">
                                <i class="fas fa-motorcycle text-white"></i> <span
                                    class="ms-1 d-none d-sm-inline text-white">Orders</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col py-3">
                <h1>Hello {{ Auth::guard('admin')->user()->name }} !</h1>
                <br>
                <ul>
                    <li>
                        <h3 class="text-success"> <i class="fa fa-user" aria-hidden="true"></i> Users no. :
                            {{ $usersNo ?? 0 }}</h3>
                    </li>
                    <br>
                    <li>
                        <h3 class="text-warning"> <i class="fas fa-hamburger"></i> Chefs no. :
                            {{ $chefNo ?? 0 }}</h3>
                    </li>
                    <br>
                    <li>
                        <h3 class="text-primary"> <i class="fas fa-user-cog"></i> Admin no. : {{ $adminNo ?? 0 }}</h3>
                    </li>
                    <br>
                    <li>
                        <h3 class="text-dark"> <i class="fas fa-motorcycle"></i> Order no. : {{ $orderNo ?? 0 }}</h3>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    {{-- <div class="container">
    </div> --}}
@endsection
