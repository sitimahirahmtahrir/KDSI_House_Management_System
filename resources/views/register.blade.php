<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="auth-container">
        <h1 class="text-center">KDSI House Management System</h1>
        <h2 class="text-center">Register</h2>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="auth-form">
            @csrf
            <!-- Name Field -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                    class="@error('name') input-error @enderror"
                >
                @error('name')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                    class="@error('email') input-error @enderror"
                >
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    required
                    class="@error('password') input-error @enderror"
                >
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <!-- Confirm Password Field -->
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                >
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-primary">Register</button>
        </form>

        <!-- Login Link -->
        <p class="text-center">
            Already have an account? <a href="{{ route('login') }}">Login here</a>.
        </p>
    </div>
</body>
</html>
