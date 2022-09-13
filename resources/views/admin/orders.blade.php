@extends('layouts.app')

@section('title', 'Orders page')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <h1>orders page</h1>
    </div>
@endsection
