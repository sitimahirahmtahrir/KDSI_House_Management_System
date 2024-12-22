@extends('layout')

@section('content')
<div class="container">
    <h2>Create House</h2>
    <form action="{{ route('houses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">House Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status" class="form-control">
                <option value="Vacant">Vacant</option>
                <option value="Occupied">Occupied</option>
                <option value="Under Maintenance">Under Maintenance</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add House</button>
    </form>
</div>
@endsection
