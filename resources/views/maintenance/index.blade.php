@extends('layouts.app')

@section('content')
    <x-header title="Maintenance Requests" />

    <!-- Visual Summaries Section -->
    <div class="container my-4">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Requests</h5>
                        <p class="card-text display-6">{{ $totalRequests }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">In Progress</h5>
                        <p class="card-text display-6">{{ $inProgress }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Solved</h5>
                        <p class="card-text display-6">{{ $solved }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Maintenance Requests Table -->
    <div class="container">
        <h4>Maintenance Requests</h4>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>House Address</th>
                    <th>Problem Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $request->house->address }}</td>
                        <td>{{ $request->description }}</td>
                        <td>{{ ucfirst($request->status) }}</td>
                        <td>
                            <a href="{{ route('maintenance.edit', $request->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No maintenance requests available.</td>
                    </tr>
                @endforelse
                @include('components.footer')

            </tbody>
        </table>
    </div>
@endsection
