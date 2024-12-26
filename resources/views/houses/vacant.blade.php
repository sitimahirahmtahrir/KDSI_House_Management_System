<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacant Houses | KDSI House Management System</title>
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
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        table th {
            background-color: #343a40;
            color: white;
        }
        table tbody tr:hover {
            background-color: #f1f3f5;
        }
        .no-houses {
            text-align: center;
            margin-top: 50px;
            color: gray;
        }
    </style>
</head>
<body>
    <header class="py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="display-6 m-0">Vacant Houses</h1>
            <div>
                <a href="{{ route('dashboard') }}" class="text-white me-3">Dashboard</a>
                <a href="{{ route('logout') }}" class="text-white">Logout</a>
            </div>
        </div>
    </header>
    <div class="container my-5">
        <h2 class="mb-4">List of Vacant Houses</h2>
        <div class="table-responsive">
            @if ($vacantHouses->count() > 0)
                <table class="table table-striped table-hover align-middle shadow-sm">
                    <thead>
                        <tr>
                            <th>House ID</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacantHouses as $house)
                            <tr>
                                <td>{{ $house->id }}</td>
                                <td>{{ $house->address }}</td>
                                <td>
                                    <form action="{{ route('houses.book', $house->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Book for Staff</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="no-houses">No vacant houses available at the moment.</p>
            @endif
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
