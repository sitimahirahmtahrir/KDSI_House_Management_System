@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Vacant Houses</h1>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>House ID</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($houses as $house)
                        <tr>
                            <td>{{ $house->id }}</td>
                            <td>{{ $house->address }}</td>
                            <td>
                                <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('houses.destroy', $house->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-3">
        <a href="{{ route('houses.create') }}" class="btn btn-success">Add New House</a>
    </div>
</div>
@endsection
