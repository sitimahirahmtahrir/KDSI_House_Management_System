<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title inertia>{{ config('app.name', 'KDSI House Management System') }}</title>
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <!-- Header -->
    <header class="bg-primary py-3">
        <div class="container text-center text-white">
            <h1 class="h3">{{ config('app.name', 'KDSI House Management System') }}</h1>
        </div>
    </header>

    <!-- Inertia Content -->
    @inertia

    <!-- Footer -->
    <footer class="bg-dark text-black py-3 mt-auto">
        <div class="container text-center">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>
</body>
</html>
