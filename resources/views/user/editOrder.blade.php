@extends('layouts.app')

@section('title', 'Edit order')

@section('content')
    <br>
    <div class="container">
        <a href="{{ Route('dashboard') }}" class="btn btn-primary">Back</a>
        <br><br>
        <h4>Edit the order no.{{ $order->id }}</h4>
        <form method="POST" action="{{ Route('editOrder', $order->id) }}">
            @csrf
            <div class="form-group">
                <label>title</label>
                <input type="text" class="form-control" name="title" placeholder="title" value="{{ $order->title }}">
            </div>
            <div class="form-group">
                <label>description</label>
                <input type="text" class="form-control" name="description" placeholder="description"
                    value="{{ $order->description }}">
            </div>
            <div class="form-group">
                <label>price</label>
                <input type="number" class="form-control" name="price" placeholder="price" value="{{ $order->price }}">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
