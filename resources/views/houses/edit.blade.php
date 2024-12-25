<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit House | KDSI House Management System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit House</h1>
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('houses.update', $house->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="{{ $house->address }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="vacant" {{ $house->status == 'vacant' ? 'selected' : '' }}>Vacant</option>
                    <option value="occupied" {{ $house->status == 'occupied' ? 'selected' : '' }}>Occupied</option>
                    <option value="under maintenance" {{ $house->status == 'under maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Update House</button>
        </form>
    </div>
</body>
</html>
