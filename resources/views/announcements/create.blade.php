@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Header -->
    <div class="py-3 mb-4" style="background-color: navy; color: white;">
        <h1 class="text-center">Create Announcement</h1>
    </div>

    <!-- Form -->
    <form action="{{ route('announcements.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Published At</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control">
        </div>
        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection
