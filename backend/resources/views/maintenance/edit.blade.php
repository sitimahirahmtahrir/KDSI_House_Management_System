@extends('layout')

@section('content')
<div class="container">
    <h2>Edit Maintenance Request</h2>
    <form action="{{ route('maintenance.update', $request->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="house_id">Select House:</label>
            <select name="house_id" id="house_id" class="form-control" required>
                @foreach ($houses as $house)
                <option value="{{ $house->id }}" {{ $house->id == $request->house_id ? 'selected' : '' }}>{{ $house->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="description">Issue Description:</label>
            <textarea name="description" id="description" class="form-control" required>{{ $request->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Upload New Image (optional):</label>
            <input type="file" name="image" id="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">Update Request</button>
    </form>
</div>
@endsection
