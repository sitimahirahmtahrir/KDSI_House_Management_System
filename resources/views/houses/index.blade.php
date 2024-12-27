@extends('layouts.app')

@section('content')
<x-header title="KDSI House Management" />

    <!-- Visual Summaries Section -->
    <div class="container my-4">
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Houses</h5>
                        <p class="card-text display-6">{{ $totalHouses }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Vacant Houses</h5>
                        <p class="card-text display-6">{{ $vacantHouses }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Occupied Houses</h5>
                        <p class="card-text display-6">{{ $occupiedHouses }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div <div class="container my-5">
    <h4 class="mb-4 text-center">TOTAL OF HOUSES</h4>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Resident Name</th>
                <th>House Address</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($houses as $house)
                <tr>
                    <td>{{ $house->id }}</td>
                    <td>{{ $house->resident->name ?? 'N/A' }}</td> <!-- Display resident's name -->
                    <td>{{ $house->address }}</td>
                    <td>{{ ucfirst($house->status) }}</td>
                    <td>
                        <a href="{{ route('houses.edit', $house->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('houses.destroy', $house->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @include('components.footer')

        </tbody>
    </table>
</div>
@endsection

