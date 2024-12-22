@extends('layout')

@section('content')
<div class="container mt-5">
    <h1>Admin Dashboard</h1>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Houses</h5>
                    <p class="card-text">{{ $totalHouses }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Maintenance Requests</h5>
                    <p class="card-text">{{ $totalMaintenance }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Guests Checked In</h5>
                    <p class="card-text">{{ $checkedInGuests }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
