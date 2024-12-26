@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Houses</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($houses as $house)
            <tr>
                <td>{{ $house->id }}</td>
                <td>{{ $house->address }}</td>
                <td>{{ $house->status }}</td>
                <td>
                    <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('houses.destroy', $house->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $houses->links() }}
</div>
@endsection
