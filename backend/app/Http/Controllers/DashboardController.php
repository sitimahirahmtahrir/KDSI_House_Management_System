<?php

namespace App\Http\Controllers;

use App\Models\House;
use App\Models\MaintenanceRequest;

class DashboardController extends Controller
{
    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $houseCount = House::count();
            $pendingRequests = MaintenanceRequest::where('status', 'Pending')->count();

            return view('dashboard', compact('houseCount', 'pendingRequests'));
        }

        return view('user-dashboard');
    }
}
