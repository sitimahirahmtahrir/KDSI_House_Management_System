<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Requests | KDSI House Management System</title>
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
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .badge {
            padding: 0.5em 0.75em;
            font-size: 0.9em;
        }
        .badge-pending {
            background-color: #ffc107; /* Yellow for pending */
            color: #212529;
        }
        .badge-in-progress {
            background-color: #0dcaf0; /* Blue for in progress */
            color: white;
        }
        .badge-completed {
            background-color: #28a745; /* Green for completed */
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
            <h1 class="display-6 m-0">KDSI Maintenance Management</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-white me-3">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-white">Logout</a>
            </div>
        </div>
    </header>
    <div class="container my-5">
        <!-- Summary Cards -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Requests</h5>
                        <p class="display-6">{{ $totalRequests }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">In Progress</h5>
                        <p class="display-6 text-info">{{ $inProgressRequests }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title">Completed</h5>
                        <p class="display-6 text-success">{{ $completedRequests }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance Requests Table -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Maintenance Requests</h2>
            <a href="{{ route('maintenance.create') }}" class="btn btn-primary">Add New Request</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle shadow-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>House</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($requests as $request)
                        <tr>
                            <td>{{ $request->id }}</td>
                            <td>{{ $request->house->address }}</td>
                            <td>{{ $request->description }}</td>
                            <td>
                                @if ($request->status === 'pending')
                                    <span class="badge badge-pending">Pending</span>
                                @elseif ($request->status === 'in_progress')
                                    <span class="badge badge-in-progress">In Progress</span>
                                @elseif ($request->status === 'completed')
                                    <span class="badge badge-completed">Completed</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('maintenance.edit', $request->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                                <form action="{{ route('maintenance.destroy', $request->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this request?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No maintenance requests found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
