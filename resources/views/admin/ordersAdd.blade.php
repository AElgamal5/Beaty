@extends('layouts.app')

@section('title', 'Order add')

@section('content')
    <br>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.orders') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>ADD Order: </h1>
        <br>
        <form method="POST" action="{{ Route('admin.orders.add.post') }}">
            @csrf
            <div class="form-group">
                <label>User ID</label>
                <input type="number" class="form-control" name="user_id" placeholder="User ID">
            </div>
            <div class="form-group">
                <label>Chef ID</label>
                <input type="number" class="form-control" name="chef_id" placeholder="Chef ID">
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="phone">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="address">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" placeholder="address">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="number" class="form-control" name="status" placeholder="address">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> ADD</button>
            <br>
            <br>
        </form>
    </div>
@endsection
