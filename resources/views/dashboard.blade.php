<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | KDSI Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        header {
            background: #001f3f; /* Navy Blue */
            color: white;
            padding: 15px;
        }
        .header-title {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .header-links .dropdown-toggle {
            border: none;
            background: none;
            color: white;
        }
        .summary-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .summary-card .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            color: #0d6efd;
        }
        .announcement-card {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .announcement-item {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .announcement-item h5 {
            margin-bottom: 10px;
            font-size: 1.25rem;
            color: #333;
        }
        .announcement-item p {
            margin: 0;
            color: #555;
        }
    </style>
</head>
<body>
    <header class="d-flex justify-content-between align-items-center">
        <div class="header-title">KDSI House Management System</div>
        <div class="header-links">
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    ☰
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="{{ route('users.index') }}">User Management</a></li>
                    <li><a class="dropdown-item" href="{{ route('reports.index') }}">Report</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container my-5">
        <h1 class="text-center mb-4">Welcome to the Dashboard</h1>

        <!-- Summary Section -->
        <div class="row text-center mb-4">
            <div class="col-md-3">
                <a href="{{ route('houses.index') }}" class="text-decoration-none">
                    <div class="summary-card">
                        <div class="icon">&#x1F3E0;</div>
                        <h5>Total Houses</h5>
                        <p>{{ $totalHouses }}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('houses.underMaintenance') }}" class="text-decoration-none">
                    <div class="summary-card">
                        <div class="icon">&#x1F527;</div>
                        <h5>Under Maintenance</h5>
                        <p>{{ $underMaintenance }}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('maintenance.newRequests') }}" class="text-decoration-none">
                    <div class="summary-card">
                        <div class="icon">&#x1F4DD;</div>
                        <h5>New Maintenance Requests</h5>
                        <p>{{ $newRequestsCount }}</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('guests.index') }}" class="text-decoration-none">
                    <div class="summary-card">
                        <div class="icon">&#x1F465;</div>
                        <h5>House Visitors</h5>
                        <p>{{ $houseVisitors }}</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- Announcements Section -->
        <div class="announcement-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Latest Announcements</h4>
                <a href="{{ route('announcements.create') }}" class="btn btn-primary btn-sm">Add New Announcement</a>
            </div>
            <div class="announcement-list">
                @forelse ($announcements as $announcement)
                    <div class="announcement-item">
                        <h5>{{ $announcement->title }}</h5>
                        <p><strong>Date:</strong> {{ $announcement->date }} | <strong>Time:</strong> {{ $announcement->time }}</p>
                        <p>{{ $announcement->details }}</p>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('announcements.edit', $announcement->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form action="{{ route('announcements.destroy', $announcement->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this announcement?')">Delete</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">No announcements available at the moment.</p>
                @endforelse
                @include('components.footer')

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
