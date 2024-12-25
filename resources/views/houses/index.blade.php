<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Houses | KDSI House Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        header {
            background: #001f3f; /* Navy Blue */
            color: white;
        }
        .btn-primary {
            background-color: #0d6efd;
            border: none;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .badge {
            padding: 0.5em 0.75em;
            font-size: 0.9em;
        }
        .badge-vacant {
            background-color: #6c757d; /* Neutral gray */
            color: white;
        }
        .badge-maintenance {
            background-color: #ffc107; /* Yellow for maintenance */
            color: #212529;
        }
        .badge-occupied {
            background-color: #28a745; /* Green for occupied */
            color: white;
        }
        table th {
            background-color: #343a40;
            color: black;
        }
        table tbody tr:hover {
            background-color: #f1f3f5;
        }
    </style>
</head>
<body>
    <header class="py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="display-6 m-0">KDSI House Management</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-white me-3">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-white">Logout</a>
            </div>
        </div>
    </header>
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>House Management</h2>
            <a href="{{ route('houses.create') }}" class="btn btn-primary">Add New House</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle shadow-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($houses as $house)
                        <tr>
                            <td>{{ $house->id }}</td>
                            <td>{{ $house->address }}</td>
                            <td>
                                @if ($house->status === 'vacant')
                                    <span class="badge badge-vacant">Vacant</span>
                                @elseif ($house->status === 'under_maintenance')
                                    <span class="badge badge-maintenance">Under Maintenance</span>
                                @elseif ($house->status === 'occupied')
                                    <span class="badge badge-occupied">Occupied</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('houses.destroy', $house->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this house?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No houses available</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
