@extends('layouts.app')

@section('title', 'User Add')

@section('content')
    <br>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.users') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Edit User</h1>
        <br>
        <form method="POST" action="{{ Route('admin.users.add.post') }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="name"">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" placeholder="password"">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="phone">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="address">
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
    </div>
@endsection
