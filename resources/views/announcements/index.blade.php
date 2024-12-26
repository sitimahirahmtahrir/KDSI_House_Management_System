@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Announcements</h1>

    <!-- Search Form -->
    <form method="GET" action="{{ route('announcements.index') }}" class="d-flex mb-3">
        <input type="text" name="search" placeholder="Search announcements..." class="form-control me-2" value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ Str::limit($announcement->content, 50) }}</td>
                    <td>{{ $announcement->published_at }}</td>
                    <td>
                        <a href="{{ route('announcements.show', $announcement) }}" class="btn btn-info">View</a>
                        <a href="{{ route('announcements.edit', $announcement) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('announcements.destroy', $announcement) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No announcements found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $announcements->links() }}
</div>
@endsection
