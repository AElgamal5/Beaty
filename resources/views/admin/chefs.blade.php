@extends('layouts.app')

@section('title', 'Chefs page')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Chefs page</h1>
        <br>
        <a href="{{ Route('admin.chefs.add') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>Add New Chef</a>
        <br>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Rating</th>
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chefs as $chef)
                        <tr>
                            <td>{{ $chef->id }}</td>
                            <td>{{ $chef->name }}</td>
                            <td>{{ $chef->email }}</td>
                            <td>{{ $chef->phone }}</td>
                            <td>{{ $chef->address }}</td>
                            <td>{{ $chef->rating }}</td>
                            <td><a href="{{ Route('admin.chefs.edit', $chef->id) }}" class="btn btn-primary">Edit</a> | <a
                                    href="{{ Route('admin.chefs.delete', $chef->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
