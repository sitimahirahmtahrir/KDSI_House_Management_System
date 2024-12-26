@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Guest</h1>
    <form action="{{ route('guests.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="visit_date" class="form-label">Visit Date</label>
            <input type="date" name="visit_date" id="visit_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
