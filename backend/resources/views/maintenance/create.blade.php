@extends('layout')

@section('content')
<div class="container">
    <h2>Create Maintenance Request</h2>
    <form action="{{ route('maintenance.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="house_id">Select House:</label>
            <select name="house_id" id="house_id" class="form-control" required>
                @foreach ($houses as $house)
                <option value="{{ $house->id }}">{{ $house->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Issue Description:</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Submit Request</button>
    </form>
</div>
@endsection
