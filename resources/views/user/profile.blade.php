@extends('layouts.app')

@section('title', 'User profile')

@section('content')
    <br>
    <div class="container">
        <a class="btn btn-primary" href="{{ Route('dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br><br>
        <h3>User profile : </h3>
        <br><br>
        <form action="{{ Route('profile.edit', $user->id) }}" method="POST">
            @csrf
            <div class="row">
                <label class="col-3 h4">User No.: </label>
                <input type="text" value="{{ $user->id }}" readonly size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">User Name: </label>
                <input type="text" value="{{ $user->name }}" name="name" size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">User Email: </label>
                <input type="text" value="{{ $user->email }}" name="email" size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">User password: </label>
                <input type="password" value="........" name="password" size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">User Phone: </label>
                <input type="text" value="{{ $user->phone }}" name="phone" size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">User Address: </label>
                <input type="text" value="{{ $user->address }}" name="address" size="35" class="h4">
            </div>
            <br>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save</button>
        </form>
    </div>
@endsection
