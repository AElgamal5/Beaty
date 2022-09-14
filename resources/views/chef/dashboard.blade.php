@extends('layouts.app')

@section('title', 'Chef dashboard')

@section('content')
    <div class="container">
        <h1>Hello {{ $data->name }} !</h1>
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
                        <th>state</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accepted_orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->title }}</td>
                            <td>{{ $order->description }}</td>
                            <td>{{ $order->price }}</td>
                            @if ($order->status == 0)
                                <td><a href="{{ Route('chef.mark_order_done', $order->id) }}" class="btn btn-success"><i
                                            class="fa-solid fa-check"></i> Ready</a></td>
                            @else
                                <td>Done</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $accepted_orders->links() !!}
            <br>
        </div>
        <br>
        <br><br>
        <h3>Orders :</h3>
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
                            <td><a href="{{ Route('chef.accept_order', $order->id) }}" class="btn btn-primary"><i
                                        class="fa-solid fa-thumbtack"></i> Accept</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $orders->links() !!}
            <br>
        </div>
    </div>
@endsection
