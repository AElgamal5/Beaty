@extends('layouts.app')

@section('title', 'Chefs page')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Orders page</h1>
        <br>
        <a href="{{ Route('admin.orders.add') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>Add New Order</a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>User ID</th>
                        <th>Chef ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->chef_id ?? 'wating' }}</td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->status }}</td>
                            <td><a href="{{ Route('admin.orders.edit', $order->id) }}" class="btn btn-primary">Edit</a> | <a
                                    href="{{ Route('admin.orders.delete', $order->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
