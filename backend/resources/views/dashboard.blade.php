@extends('layout')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="dashboard-cards">
        <div class="card">
            <h2>Total Houses</h2>
            <p>{{ $totalHouses }}</p>
        </div>
        <div class="card">
            <h2>Occupied Houses</h2>
            <p>{{ $occupiedHouses }}</p>
        </div>
        <div class="card">
            <h2>Vacant Houses</h2>
            <p>{{ $vacantHouses }}</p>
        </div>
        <div class="card">
            <h2>Total Guests</h2>
            <p>{{ $totalGuests }}</p>
        </div>
        <div class="card">
            <h2>Pending Maintenance Requests</h2>
            <p>{{ $pendingMaintenanceRequests }}</p>
        </div>
    </div>
</div>
@endsection
