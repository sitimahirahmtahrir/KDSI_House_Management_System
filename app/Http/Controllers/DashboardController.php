<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House; // Import the House model
use App\Models\MaintenanceRequest; // Import the MaintenanceRequest model
use App\Models\Guest; // Import the Guest model
use App\Models\Announcement; // Import the Announcement model

class DashboardController extends Controller
{
    public function index()
    {
        $totalHouses = House::count();
        $underMaintenance = House::where('status', 'under maintenance')->count();
        $newRequestsCount = MaintenanceRequest::where('status', 'pending')->count();
        $houseVisitors = Guest::count(); // Or logic to count visitors
        $announcements = Announcement::latest()->take(5)->get(); // Fetch the latest 5 announcements

        return view('dashboard', compact('totalHouses', 'underMaintenance', 'newRequestsCount', 'houseVisitors', 'announcements'));
    }
}


