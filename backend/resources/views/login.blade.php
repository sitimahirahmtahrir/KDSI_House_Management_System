@extends('layout')

@section('content')
<h1>Login</h1>
<form action="{{ route('login') }}" method="POST">
    @csrf
    <label>Email:</label>
    <input type="email" name="email" required>
    <label>Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>
@endsection
