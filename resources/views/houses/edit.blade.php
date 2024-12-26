@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit House</h1>
    <form action="{{ route('houses.update', $house->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" value="{{ $house->address }}" class="form-control @error('address') is-invalid @enderror" required>
            @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="vacant" {{ $house->status == 'vacant' ? 'selected' : '' }}>Vacant</option>
                <option value="occupied" {{ $house->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                <option value="under maintenance" {{ $house->status == 'under maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
            @error('status')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
