<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="navbar">
        <h1>KDSI House Management System</h1>
    </header>
    <div class="auth-container">
        <h2>Login</h2>
        @if (session('error'))
            <div class="error-message">
                {{ session('error') }}
            </div>
        @endif
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <label for="remember">
                    <input type="checkbox" name="remember" id="remember"> Remember Me
                </label>
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
        <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
    </div>
</body>
</html>
