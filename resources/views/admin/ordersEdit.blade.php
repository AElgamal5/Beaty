@extends('layouts.app')

@section('title', 'Order edit')

@section('content')
    <br>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.orders') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Edit User: </h1>
        <br>
        <form method="POST" action="{{ Route('admin.orders.edit.post', $order->id) }}">
            @csrf
            <div class="form-group">
                <label>User ID</label>
                <input type="number" class="form-control" name="user_id" placeholder="User ID" value="{{ $order->user_id }}">
            </div>
            <div class="form-group">
                <label>Chef ID</label>
                <input type="number" class="form-control" name="chef_id" placeholder="Chef ID"
                    value="{{ $order->chef_id }}">
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" placeholder="phone" value="{{ $order->title }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" class="form-control" name="description" placeholder="address"
                    value="{{ $order->description }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="price" placeholder="address" value="{{ $order->price }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <input type="number" class="form-control" name="status" placeholder="address"
                    value="{{ $order->status }}">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-pen"></i> Save</button>
        </form>
    </div>
@endsection
