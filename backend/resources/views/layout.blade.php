<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <h1>KDSI House Management System</h1>
    </header>
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('houses.index') }}">Houses</a></li>
            <li><a href="{{ route('guests.index') }}">Guests</a></li>
            <li><a href="{{ route('maintenance.index') }}">Maintenance</a></li>
            <li><a href="{{ route('reports.index') }}">Reports</a></li>
        </ul>
    </nav>
    <main>
        @yield('content')
    </main>
    <footer class="main-footer">
        <p>&copy; {{ date('Y') }} KDSI House Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
