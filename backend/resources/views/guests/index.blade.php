@extends('layout')

@section('content')
<div class="container">
    <h2>Guests List</h2>
    <a href="{{ route('guests.create') }}" class="btn btn-success mb-3">Add New Guest</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guests as $guest)
            <tr>
                <td>{{ $guest->name }}</td>
                <td>{{ $guest->email }}</td>
                <td>{{ $guest->phone }}</td>
                <td>{{ $guest->check_in }}</td>
                <td>{{ $guest->check_out }}</td>
                <td>
                    <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
