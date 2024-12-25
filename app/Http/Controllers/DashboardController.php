<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Guest;
use App\Models\MaintenanceRequest;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    /**
     * Display the dashboard overview.
     *
     * @return Response
     */
    public function index(): Response
    {
        // Fetch data for the dashboard
        $totalHouses = House::count();
        $occupiedHouses = House::where('status', 'occupied')->count();
        $vacantHouses = House::where('status', 'vacant')->count();
        $totalGuests = Guest::count();
        $pendingMaintenanceRequests = MaintenanceRequest::where('status', 'pending')->count();

        // Prepare data to send to the frontend
        $data = [
            'totalHouses' => $totalHouses,
            'occupiedHouses' => $occupiedHouses,
            'vacantHouses' => $vacantHouses,
            'totalGuests' => $totalGuests,
            'pendingMaintenanceRequests' => $pendingMaintenanceRequests,
        ];

        // Pass data to the Inertia Vue component
        return Inertia::render('Dashboard', $data);
    }
}
