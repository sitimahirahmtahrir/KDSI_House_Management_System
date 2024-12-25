<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guests | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Guest Management</h1>
        <a href="{{ route('guests.create') }}" class="btn-primary">Add New Guest</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Check-In</th>
                    <th>Check-Out</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guests as $guest)
                    <tr>
                        <td>{{ $guest->id }}</td>
                        <td>{{ $guest->name }}</td>
                        <td>{{ $guest->contact }}</td>
                        <td>{{ $guest->check_in }}</td>
                        <td>{{ $guest->check_out }}</td>
                        <td>
                            <a href="{{ route('guests.edit', $guest->id) }}" class="btn-secondary">Edit</a>
                            <form action="{{ route('guests.destroy', $guest->id) }}" method="POST" style="display:inline;">
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
