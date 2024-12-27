@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Announcement</h1>
    <form action="{{ route('announcements.update', $announcement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $announcement->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" rows="5" class="form-control" required>{{ $announcement->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="published_at" class="form-label">Published At</label>
            <input type="datetime-local" name="published_at" id="published_at" class="form-control" value="{{ $announcement->published_at }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
