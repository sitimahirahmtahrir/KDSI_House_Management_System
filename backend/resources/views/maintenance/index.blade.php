<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Requests | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Maintenance Requests</h1>
        <a href="{{ route('maintenance.create') }}" class="btn-primary">Add New Request</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>House</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ $request->house->address }}</td>
                        <td>{{ $request->description }}</td>
                        <td>{{ ucfirst($request->status) }}</td>
                        <td>
                            <a href="{{ route('maintenance.edit', $request->id) }}" class="btn-secondary">Edit</a>
                            <form action="{{ route('maintenance.destroy', $request->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
