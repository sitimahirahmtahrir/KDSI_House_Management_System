<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>House Management</h1>
        <a href="{{ route('houses.create') }}" class="btn-primary">Add New House</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($houses as $house)
                    <tr>
                        <td>{{ $house->id }}</td>
                        <td>{{ $house->address }}</td>
                        <td>{{ ucfirst($house->status) }}</td>
                        <td>
                            <a href="{{ route('houses.edit', $house->id) }}" class="btn-secondary">Edit</a>
                            <form action="{{ route('houses.destroy', $house->id) }}" method="POST" style="display:inline;">
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
