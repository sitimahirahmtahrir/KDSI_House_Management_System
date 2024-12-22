@extends('layout')

@section('content')
<div class="container">
    <h2>Create Guest</h2>
    <form action="{{ route('guests.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Guest Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="check_in">Check-In Date:</label>
            <input type="date" name="check_in" id="check_in" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="check_out">Check-Out Date:</label>
            <input type="date" name="check_out" id="check_out" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Guest</button>
    </form>
</div>
@endsection
