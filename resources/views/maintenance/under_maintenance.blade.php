@extends('layouts.app')

@section('content')
<x-header title="KDSI House Management" />

<div class="container">
    <h1>Under Maintenance</h1>
    <table class="table table-bordered" id="underMaintenanceTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Resident Name</th>
                <th>House Address</th>
                <th>House Problem Description</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($requests as $request)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $request->house->resident_name ?? 'N/A' }}</td>
                <td>{{ $request->house->address ?? 'N/A' }}</td>
                <td>{{ $request->description }}</td>
                <td>{{ ucfirst($request->status) }}</td>
                <td>
                    <form action="{{ route('maintenance.updateStatus', $request->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                            <option value="in progress" {{ $request->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="solved" {{ $request->status == 'solved' ? 'selected' : '' }}>Solved</option>
                            <option value="closed">Close</option>
                        </select>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No requests under maintenance found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $requests->links() }}
    </div>
</div>
@endsection
