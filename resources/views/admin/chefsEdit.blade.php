@extends('layouts.app')

@section('title', 'Chef edit')

@section('content')
    <br>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.chefs') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Edit Chef: </h1>
        <br>
        <form method="POST" action="{{ Route('admin.chefs.edit.post', $chef->id) }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{ $chef->name }}">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"
                    value="{{ $chef->email }}">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="phone" value="{{ $chef->phone }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="address"
                    value="{{ $chef->address }}">
            </div>
            <div class="form-group">
                <label>Rating</label>
                <input type="text" class="form-control" name="rating" placeholder="address" value="{{ $chef->rating }}">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </form>
    </div>
@endsection
