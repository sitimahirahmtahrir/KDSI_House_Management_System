@extends('layout')

@section('content')
<div class="container">
    <h2>Edit House</h2>
    <form action="{{ route('houses.update', $house->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">House Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $house->name }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" class="form-control" required>{{ $house->address }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="Vacant" {{ $house->status == 'Vacant' ? 'selected' : '' }}>Vacant</option>
                <option value="Occupied" {{ $house->status == 'Occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="Under Maintenance" {{ $house->status == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update House</button>
    </form>
</div>
@endsection
