@extends('layouts.app')

@section('title', 'Chef Login')

@section('content')
<br>
<div class="container">
    <h3>Chef Login:</h3>
    <form method="POST" action="{{ route('chef.login') }}">
        @csrf
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
    <br>
    <div>
        <a href="{{ Route('chef.register_index') }}">I don't have an account</a>
    </div>
</div>
@endsection