@extends('layouts.app')

@section('title', 'User Register')

@section('content')
    <br>
    <div class="container">
        <h3>User Register :</h3>
        <br>
        <form method="POST" action="{{ route('chef.register') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="name">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>phone</label>
                <input type="text" class="form-control" name="phone" placeholder="phone">
            </div>
            <div class="form-group">
                <label>address</label>
                <input type="text" class="form-control" name="address" placeholder="address">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
        <br>
        <a href="{{ Route('chef.login_index') }}">Already have an account</a>
    </div>
@endsection
