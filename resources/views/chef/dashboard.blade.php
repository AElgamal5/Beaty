@extends('layouts.app')

@section('title', 'Chef dashboard')

@section('content')
    <div class="container">
        <h1>{{ $data->name }} is logged in !</h1>
        <hr>
        <h3>Accepted orders :</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($accepted_orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <br><br>
        <h3>Accepted orders :</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Accepted</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->title }}</td>
                        <td>{{ $order->description }}</td>
                        <td>{{ $order->price }}</td>
                        <td><a href="{{ Route('chef.accept_order', $order->id) }}" class="btn btn-primary">Accept</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
