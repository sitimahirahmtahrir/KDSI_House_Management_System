@extends('layout')

@section('content')
<div class="container">
    <h2>Maintenance Requests</h2>
    <a href="{{ route('maintenance.create') }}" class="btn btn-success mb-3">Add New Request</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>House Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($requests as $request)
            <tr>
                <td>{{ $request->house->name }}</td>
                <td>{{ $request->description }}</td>
                <td>{{ $request->status }}</td>
                <td>
                    <a href="{{ route('maintenance.edit', $request->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('maintenance.destroy', $request->id) }}" method="POST" class="d-inline">
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
