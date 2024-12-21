@extends('layout')

@section('content')
<h1>Create New House</h1>
<form action="{{ route('houses.store') }}" method="POST">
    @csrf
    <label>House Number:</label>
    <input type="text" name="house_number" required>
    <label>Location:</label>
    <input type="text" name="location" required>
    <label>Status:</label>
    <select name="status" required>
        <option value="Vacant">Vacant</option>
        <option value="Occupied">Occupied</option>
        <option value="Maintenance">Maintenance</option>
    </select>
    <button type="submit">Create</button>
</form>
@endsection
