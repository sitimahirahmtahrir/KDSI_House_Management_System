@extends('layout')

@section('content')
<h1>Edit House</h1>
<form action="{{ route('houses.update', $house->id) }}" method="POST">
    @csrf
    @method('PUT')
    <label>House Number:</label>
    <input type="text" name="house_number" value="{{ $house->house_number }}" required>
    <label>Location:</label>
    <input type="text" name="location" value="{{ $house->location }}" required>
    <label>Status:</label>
    <select name="status" required>
        <option value="Vacant" {{ $house->status == 'Vacant' ? 'selected' : '' }}>Vacant</option>
        <option value="Occupied" {{ $house->status == 'Occupied' ? 'selected' : '' }}>Occupied</option>
        <option value="Maintenance" {{ $house->status == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
    </select>
    <button type="submit">Update</button>
</form>
@endsection
