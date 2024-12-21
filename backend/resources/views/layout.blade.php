<!DOCTYPE html>
<html>
<head>
    <title>House Management System</title>
</head>
<body>
    <nav>
        <a href="{{ route('houses.index') }}">Houses</a>
        <a href="{{ route('logout') }}">Logout</a>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>
