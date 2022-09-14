@extends('layouts.app')

@section('title', 'Chef Add')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.chefs') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>ADD Chef: </h1>
        <br>
        <form method="POST" action="{{ Route('admin.chefs.add.post') }}">
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
            <div class="form-group">
                <label>Rating</label>
                <input type="number" class="form-control" name="rating" placeholder="Rating" min="0"
                    max="5">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> ADD</button>
        </form>
    </div>
@endsection
