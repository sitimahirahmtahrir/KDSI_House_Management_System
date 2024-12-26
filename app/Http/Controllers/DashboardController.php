<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\Announcement;
use App\Models\MaintenanceRequest;
use App\Models\Guest;

class DashboardController extends Controller
{
    public function index()
{
    $newRequestsCount = MaintenanceRequest::where('status', 'pending')->count();
    $underMaintenanceCount = MaintenanceRequest::where('status', 'in progress')->count();

    return view('dashboard', compact('newRequestsCount', 'underMaintenanceCount'));
}

}
