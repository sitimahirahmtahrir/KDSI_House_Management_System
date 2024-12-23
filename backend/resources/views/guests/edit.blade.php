<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guest | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Guest</h1>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('guests.update', $guest->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Guest Name:</label>
                <input type="text" name="name" id="name" value="{{ $guest->name }}" required>
            </div>
            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" name="contact" id="contact" value="{{ $guest->contact }}" required>
            </div>
            <div class="form-group">
                <label for="check_in">Check-In Date:</label>
                <input type="date" name="check_in" id="check_in" value="{{ $guest->check_in }}" required>
            </div>
            <div class="form-group">
                <label for="check_out">Check-Out Date:</label>
                <input type="date" name="check_out" id="check_out" value="{{ $guest->check_out }}" required>
            </div>
            <button type="submit" class="btn-primary">Update Guest</button>
        </form>
    </div>
</body>
</html>
