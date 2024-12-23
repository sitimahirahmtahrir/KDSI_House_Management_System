<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\Guest;
use App\Models\MaintenanceRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    /**
     * Display the dashboard overview.
     *
     * @return View
     */
    public function index(): View
    {
        // Fetch data for the dashboard
        $totalHouses = House::count();
        $occupiedHouses = House::where('status', 'occupied')->count();
        $vacantHouses = House::where('status', 'vacant')->count();
        $totalGuests = Guest::count();
        $pendingMaintenanceRequests = MaintenanceRequest::where('status', 'pending')->count();

        // Prepare data to send to the view
        $data = [
            'totalHouses' => $totalHouses,
            'occupiedHouses' => $occupiedHouses,
            'vacantHouses' => $vacantHouses,
            'totalGuests' => $totalGuests,
            'pendingMaintenanceRequests' => $pendingMaintenanceRequests,
        ];

        // Return the dashboard view with data
        return view('dashboard', $data);
    }

    /**
     * Get dashboard data for API requests.
     *
     * @return JsonResponse
     */
    public function getDashboardData(): JsonResponse
    {
        $data = [
            'totalHouses' => House::count(),
            'occupiedHouses' => House::where('status', 'occupied')->count(),
            'vacantHouses' => House::where('status', 'vacant')->count(),
            'totalGuests' => Guest::count(),
            'pendingMaintenanceRequests' => MaintenanceRequest::where('status', 'pending')->count(),
        ];

        return response()->json($data);
    }
}
