@extends('layouts.app')

@section('title', 'User edit')

@section('content')
    <br>
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.users') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Edit User: </h1>
        <br>
        <form method="POST" action="{{ route('admin.users.edit.post', $user->id) }}">
            @csrf
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" value="{{ $user->name }}">
            </div>
            <div class="form-group">
                <label for="inputEmail">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"
                    value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="phone" value="{{ $user->phone }}">
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" placeholder="address"
                    value="{{ $user->address }}">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </form>
    </div>
@endsection
