@extends('layouts.app')

@section('title', 'Users page')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Users page</h1>
        <a href="{{ Route('admin.users.add') }}" class="btn btn-success"><i class="fa-solid fa-plus"></i>Add New User</a>
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
                        <th>Edit/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                            <td><a href="{{ Route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a> | <a
                                    href="{{ Route('admin.users.delete', $user->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
