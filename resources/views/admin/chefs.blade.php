@extends('layouts.app')

@section('title', 'Chefs page')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <h1>chefs page</h1>
    </div>
@endsection
