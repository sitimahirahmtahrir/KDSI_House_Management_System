@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Under Maintenance</h1>
    <div class="table-responsive">
        <table class="table table-bordered" id="underMaintenanceTable">
            <thead class="thead-dark">
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
                    <td>
                        <span class="badge bg-warning text-dark">{{ ucfirst($request->status) }}</span>
                    </td>
                    <td>
                        <form action="{{ route('maintenance.updateStatus', $request->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="input-group">
                                <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="in progress" {{ $request->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="solved" {{ $request->status == 'solved' ? 'selected' : '' }}>Solved</option>
                                    <option value="closed">Close</option>
                                </select>
                            </div>
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
    </div>
    <div class="d-flex justify-content-center">
        {{ $requests->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Fetch under maintenance data every 5 seconds
    setInterval(function () {
        $.ajax({
            url: "{{ route('maintenance.underMaintenance') }}",
            type: "GET",
            success: function (data) {
                $('#underMaintenanceTable').html($(data).find('#underMaintenanceTable').html());
            }
        });
    }, 5000); // Refresh every 5 seconds
</script>
@endsection
