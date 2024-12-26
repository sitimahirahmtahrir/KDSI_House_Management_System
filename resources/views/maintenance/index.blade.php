@extends('layouts.app')

@section('content')
<div class="container">
    <h1>All Maintenance Requests</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Resident Name</th>
                <th>House Address</th>
                <th>Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($maintenanceRequests as $request)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $request->house->resident_name ?? 'N/A' }}</td>
                <td>{{ $request->house->address ?? 'N/A' }}</td>
                <td>{{ $request->description }}</td>
                <td>{{ ucfirst($request->status) }}</td>
                <td>
                    <a href="{{ route('maintenance.newRequests') }}" class="btn btn-primary btn-sm">View New Requests</a>
                    <a href="{{ route('maintenance.underMaintenance') }}" class="btn btn-warning btn-sm">View Under Maintenance</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No maintenance requests found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $maintenanceRequests->links() }}
    </div>
</div>
@endsection
