@extends('layouts.app')

@section('title', 'User Login')

@section('content')
    <div class="container">
        <h3>User Login:</h3>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <br>
        <div>
            <a href="{{ Route('register') }}">I don't have an account</a>
        </div>
    </div>
@endsection
