<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\MaintenanceRequest;
use App\Models\GuestVisit;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch dynamic data
        $totalHouses = House::count();
        $vacantHouses = House::where('status', 'vacant')->count();
        $occupiedHouses = House::where('status', 'occupied')->count();
        $underMaintenanceHouses = House::where('status', 'under maintenance')->count();
        $newMaintenanceRequests = MaintenanceRequest::where('status', 'new')->count();
        $houseVisitors = GuestVisit::count();

        return view('dashboard', [
            'totalHouses' => $totalHouses,
            'vacantHouses' => $vacantHouses,
            'occupiedHouses' => $occupiedHouses,
            'underMaintenanceHouses' => $underMaintenanceHouses,
            'newMaintenanceRequests' => $newMaintenanceRequests,
            'houseVisitors' => $houseVisitors,
        ]);
    }
}
