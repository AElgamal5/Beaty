@extends('layouts.app')

@section('title', 'User dashboard')

@section('content')
    <br>
    <div class="container">
        <h1>Hello {{ Auth::user()->name }} !</h1>
        <hr>
        <h3>Add an order: </h3>
        <form method="POST" action="{{ Route('addOrder') }}">
            @csrf
            <div class="form-group">
                <label class="h4">Title: </label>
                <input type="text" class="form-control" name="title" placeholder="title">
            </div>
            <div class="form-group">
                <label class="h4">Description: </label>
                <input type="text" class="form-control" name="description" placeholder="description">
            </div>
            <div class="form-group">
                <label class="h4">Price: </label>
                <input type="number" class="form-control" name="price" placeholder="price" min="1">
            </div>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> ADD</button>
        </form>
        <br>
        <hr>
        <br>
        <h3>Your orders :</h3>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No.</th>
                        <th class="text-center">Chef ID#</th>
                        <th class="text-center">title</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">status</th>
                        <th class="text-center">Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td class="text-center">{{ $order->id }}</td>
                            <td class="text-center">
                                {{-- {{ $order->chef_id ?? 'waiting' }} --}}
                                @if ($order->chef_id == null)
                                    waiting <i class="fa-solid fa-clock"></i>
                                @else
                                    <a href="{{ Route('chef.order', $order->chef_id) }}"
                                        class="btn btn-secondary btn-outline-dark text-white">Chef info. <i
                                            class="fa-solid fa-circle-info"></i></a>
                                @endif
                            </td>
                            <td class="text-center">{{ $order->title }}</td>
                            <td class="text-center">{{ $order->description }}</td>
                            <td class="text-center">{{ $order->price }}</td>
                            <td class="text-center">
                                @if ($order->chef_id == null)
                                    -
                                @elseif ($order->status == 0)
                                    Working on
                                @else
                                    @if ($order->rating == null)
                                        <form action="{{ Route('rate.order', $order->id) }}" method="POST">
                                            @csrf
                                            <input type="number" name="rating" min="1" max="5">
                                            <button class="btn btn-info">Rate</button>
                                        </form>
                                    @else
                                        rated by {{ $order->rating }}/5
                                    @endif
                                @endif

                            </td>
                            <td class="text-center"><a href="{{ Route('editOrderShow', $order->id) }}"
                                    class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Edit</a> | <a
                                    href="{{ Route('deleteOrder', $order->id) }}" class="btn btn-danger"><i
                                        class="fa-solid fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
