@extends('layout')

@section('content')
<div class="container">
    <h2>Houses List</h2>
    <a href="{{ route('houses.create') }}" class="btn btn-success mb-3">Add New House</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>House Name</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($houses as $house)
            <tr>
                <td>{{ $house->name }}</td>
                <td>{{ $house->address }}</td>
                <td>{{ $house->status }}</td>
                <td>
                    <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('houses.destroy', $house->id) }}" method="POST" class="d-inline">
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
