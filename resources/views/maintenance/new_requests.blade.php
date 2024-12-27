@extends('layouts.app')

@section('content')
    <x-header title="KDSI House Management" />

    <div class="container my-5">
        <h3 class="mb-4 text-center">{{ $maintenanceRequests->count() }} New Requests Pending</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Resident Name</th>
                    <th>House Address</th>
                    <th>Problem Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($maintenanceRequests as $request)
                    <tr>
                        <td>{{ $request->id }}</td>
                        <td>{{ optional($request->resident)->name ?? 'N/A' }}</td>
                        <td>{{ optional($request->house)->address ?? 'N/A' }}</td>
                        <td>{{ $request->description }}</td>
                        <td>{{ $request->status }}</td>
                        <td>
                            <button class="btn btn-primary btn-sm" onclick="notifyRequest({{ $request->id }})">Notify</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No pending requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function notifyRequest(requestId) {
            fetch(`/maintenance/notify/${requestId}`, {
                method: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ status: 'Notified' }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`Request ID: ${requestId} has been notified.`);
                    location.reload(); // Refresh to update the table
                } else {
                    alert('Failed to notify request.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while notifying the request.');
            });
        }
    </script>
@endsection
