@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Guest Management</h1>
    <a href="{{ route('guests.create') }}" class="btn btn-primary mb-3">Add New Guest</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Visit Date</th>
                <th>Verified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guests as $guest)
            <tr>
                <td>{{ $guest->id }}</td>
                <td>{{ $guest->name }}</td>
                <td>{{ $guest->visit_date }}</td>
                <td>{{ $guest->verified ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('guests.edit', $guest->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    <form action="{{ route('guests.verify', $guest->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success btn-sm">Verify</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $guests->links() }}
</div>
@endsection
