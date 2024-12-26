@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">New Maintenance Requests</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="newRequestsTable">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Resident Name</th>
                    <th>House Address</th>
                    <th>House Problem Description</th>
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
                    <td>
                        <form action="{{ route('maintenance.notify', $request->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-primary btn-sm">Notify</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">No new maintenance requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        {{ $requests->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Fetch new requests every 5 seconds
    setInterval(function () {
        $.ajax({
            url: "{{ route('maintenance.newRequests') }}",
            type: "GET",
            success: function (data) {
                $('#newRequestsTable').html($(data).find('#newRequestsTable').html());
            }
        });
    }, 5000); // Refresh every 5 seconds
</script>
@endsection
