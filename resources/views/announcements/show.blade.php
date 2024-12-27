@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $announcement->title }}</h1>
    <p>{{ $announcement->content }}</p>
    <p><strong>Published At:</strong> {{ $announcement->published_at }}</p>
    <a href="{{ route('announcements.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
