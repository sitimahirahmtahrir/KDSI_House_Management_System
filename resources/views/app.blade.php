<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'KDSI House Management System') }}</title>

    <!-- Include Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Inertia Head -->
    @inertiaHead

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        header {
            background-color: #001f3f; /* Navy Blue */
            color: white;
        }
        footer {
            background-color: #343a40; /* Dark Gray */
            color: white;
        }
    </style>
</head>
<body class="bg-gray-100 dark:bg-gray-900 d-flex flex-column min-vh-100">
    <!-- Header -->
    <header class="py-3">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">{{ config('app.name', 'KDSI House Management System') }}</h1>
            <div class="dropdown">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="headerDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    ☰
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="headerMenuButton">
                    <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a class="dropdown-item" href="{{ route('users.index') }}">User Management</a></li>
                    <li><a class="dropdown-item" href="{{ route('reports.index') }}">Report</a></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Inertia Content -->
    <main class="flex-grow-1">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-3 text-center mt-auto">
        <div class="container">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
