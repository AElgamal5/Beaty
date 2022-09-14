@extends('layouts.app')

@section('title', 'Chef profile')

@section('content')
    <br>
    <div class="container">
        <a class="btn btn-primary" href="{{ Route('dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br><br>
        <h3>Chef profile : </h3>
        <br><br>
        <div class="row">
            <label class="col-2 h4">Chef No.: </label>
            <input type="text" value="{{ $chef->id }}" readonly size="35" class="h4">
        </div>
        <br>
        <div class="row">
            <label class="col-2 h4">Chef Name: </label>
            <input type="text" value="{{ $chef->name }}" readonly size="35" class="h4">
        </div>
        <br>
        <div class="row">
            <label class="col-2 h4">Chef Email: </label>
            <input type="text" value="{{ $chef->email }}" readonly size="35" class="h4">
        </div>
        <br>
        <div class="row">
            <label class="col-2 h4">Chef Phone: </label>
            <input type="text" value="{{ $chef->phone }}" readonly size="35" class="h4">
        </div>
        <br>
        <div class="row">
            <label class="col-2 h4">Chef Address: </label>
            <input type="text" value="{{ $chef->address }}" readonly size="35" class="h4">
        </div>
        <br>
        <div class="row">
            <label class="col-2 h4">Chef Rating: </label>
            <input type="text" value="{{ $chef->rating }}" readonly size="35" class="h4">
        </div>
    </div>
@endsection
