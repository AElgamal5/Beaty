@extends('layouts.app')

@section('title', 'User profile')

@section('content')
    <br>
    <div class="container">
        <a class="btn btn-primary" href="{{ Route('chef.index') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br><br>
        <h3>User profile : </h3>
        <br>
        <form action="{{ Route('chef.profile.edit', Auth::guard('chef')->user()->id) }}" method="POST">
            @csrf
            <div class="row">
                <label class="col-3 h4">Chef No.: </label>
                <input type="text" value="{{ Auth::guard('chef')->user()->id }}" readonly size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">Chef Name: </label>
                <input type="text" value="{{ Auth::guard('chef')->user()->name }}" name="name" size="35"
                    class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">Chef Email: </label>
                <input type="text" value="{{ Auth::guard('chef')->user()->email }}" name="email" size="35"
                    class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">Chef password: </label>
                <input type="password" value="........" name="password" size="35" class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">Chef Phone: </label>
                <input type="text" value="{{ Auth::guard('chef')->user()->phone }}" name="phone" size="35"
                    class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">Chef Address: </label>
                <input type="text" value="{{ Auth::guard('chef')->user()->address }}" name="address" size="35"
                    class="h4">
            </div>
            <br>
            <div class="row">
                <label class="col-3 h4">Chef Rate: </label>
                <input type="text" value="{{ Auth::guard('chef')->user()->rating }}" readonly name="address"
                    size="35" class="h4">
            </div>
            <br>
            <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Save</button>
            <br><br>
        </form>
    </div>
@endsection
