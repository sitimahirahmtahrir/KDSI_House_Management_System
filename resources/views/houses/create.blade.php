<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create House | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Create House</h1>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('houses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="vacant">Vacant</option>
                    <option value="occupied">Occupied</option>
                    <option value="under maintenance">Under Maintenance</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Create House</button>
        </form>
    </div>
</body>
</html>
