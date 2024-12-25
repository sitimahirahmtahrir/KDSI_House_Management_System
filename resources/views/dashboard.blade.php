@extends('layouts.app')

@section('content')
<<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Houses</h5>
                    <p class="card-text">{{ $totalHouses }} houses managed.</p>
                    <a href="{{ route('houses.index') }}" class="btn btn-primary">View Houses</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Vacant Houses</h5>
                    <p class="card-text">{{ $vacantHouses }} vacant houses.</p>
                    <a href="{{ route('houses.index') }}" class="btn btn-primary">View Houses</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Maintenance Requests</h5>
                    <p class="card-text">{{ $pendingMaintenanceRequests }} pending requests.</p>
                    <a href="{{ route('maintenance.index') }}" class="btn btn-primary">View Requests</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Guests</h5>
                    <p class="card-text">{{ $totalGuests }} guests checked in.</p>
                    <a href="{{ route('guests.index') }}" class="btn btn-primary">View Guests</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
