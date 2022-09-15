@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <div class="container">
        <br>
        <a class="btn btn-primary" href="{{ Route('admin.dashboard') }}"><i class="fas fa-chevron-left"></i> Back </a>
        <br>
        <br>
        <h1>Contact Us page: </h1>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>created at</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->subject }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at }}</td>
                            <td>
                                @if ($contact->status == 0)
                                    <a href="{{ Route('admin.contactUS.done', $contact->id) }}"
                                        class="btn btn-primary">Check</a>
                                @else
                                    Done
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $contacts->links() !!}
            <br>
        </div>
    </div>
@endsection
