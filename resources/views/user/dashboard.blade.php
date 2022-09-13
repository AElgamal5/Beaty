@extends('layouts.app')

@section('title', 'User dashboard')

@section('content')
    <div class="container">
        <h1>{{ Auth::user()->name }} is logged in !</h1>
        <hr>
        <h3>Add an order</h3>
        <form method="POST" action="{{ Route('addOrder') }}">
            @csrf
            <div class="form-group">
                <label>title</label>
                <input type="text" class="form-control" name="title" placeholder="title">
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" class="form-control" name="description" placeholder="description">
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="number" class="form-control" name="price" placeholder="price">
            </div>
            <button type="submit" class="btn btn-primary">ADD</button>
        </form>
        <br>
        <hr>
        <br>
        <h3>Your orders :</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Chef ID#</th>
                        <th>title</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>
                                {{ $order->chef_id ?? 'waiting' }}
                            </td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->price }}</td>
                            <td><a href="{{ Route('editOrderShow', $order->id) }}" class="btn btn-primary">Edit</a> | <a
                                    href="{{ Route('deleteOrder', $order->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
