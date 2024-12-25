<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Add Bootstrap for Styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            background-color: navy;
        }
        .navbar-brand {
            color: white;
            font-weight: bold;
        }
        .navbar-brand:hover {
            color: lightgray;
        }
        .logout-link {
            color: white;
        }
        .logout-link:hover {
            color: lightgray;
            text-decoration: none;
        }
        .card {
            cursor: pointer;
            transition: box-shadow 0.3s ease;
        }
        .card:hover {
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }
        .card-body h4 {
            color: #007bff;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">KDSI Management System</a>
        <div class="ms-auto">
            <a href="{{ route('users.index') }}" class="text-decoration-none text-white me-3">User Management</a>
            <a href="#" class="text-decoration-none text-white"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</nav>


    <div class="container mt-5">
    <div class="row text-center mb-4">
        <h1>Welcome to the Dashboard</h1>
        <p class="text-muted">Here is an overview of the system's current status.</p>
    </div>

    <!-- Row for Houses Overview -->
    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('houses.index') }}" class="text-decoration-none">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h4>{{ $totalHouses }}</h4>
                        <p>Total Houses</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('houses.vacant') }}" class="text-decoration-none">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h4>{{ $vacantHouses }}</h4>
                        <p>Vacant Houses</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('houses.occupied') }}" class="text-decoration-none">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h4>{{ $occupiedHouses }}</h4>
                        <p>Occupied Houses</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('houses.underMaintenance') }}" class="text-decoration-none">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h4>{{ $underMaintenanceHouses }}</h4>
                        <p>Under Maintenance</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Row for Maintenance and Visitors -->
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="{{ route('maintenance.index') }}" class="text-decoration-none">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h4>{{ $newMaintenanceRequests }}</h4>
                        <p>New Maintenance Requests</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('guests.index') }}" class="text-decoration-none">
                <div class="card shadow border-0">
                    <div class="card-body text-center">
                        <h4>{{ $houseVisitors }}</h4>
                        <p>House Visitors</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>




<footer class="mt-5 text-center text-muted">
    <p>&copy; 2024 KDSI Management System. All rights reserved.</p>
</footer>


    <!-- Add Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
