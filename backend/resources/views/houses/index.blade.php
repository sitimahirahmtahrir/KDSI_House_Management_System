@extends('layout')

@section('content')
<h1>House Management</h1>
<a href="{{ route('houses.create') }}">Add New House</a>
<table>
    <thead>
        <tr>
            <th>House Number</th>
            <th>Location</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($houses as $house)
        <tr>
            <td>{{ $house->house_number }}</td>
            <td>{{ $house->location }}</td>
            <td>{{ $house->status }}</td>
            <td>
                <a href="{{ route('houses.edit', $house->id) }}">Edit</a>
                <form action="{{ route('houses.destroy', $house->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
