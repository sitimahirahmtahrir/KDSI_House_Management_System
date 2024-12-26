<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceRequest;

class MaintenanceController extends Controller
{
    // New Maintenance Requests: Only Pending Requests
    public function newRequests()
    {
        $requests = MaintenanceRequest::with('house')
            ->where('status', 'pending')
            ->paginate(10);

        return view('maintenance.new_requests', compact('requests'));
    }

    // Under Maintenance Requests: In Progress
    public function underMaintenance()
    {
        $requests = MaintenanceRequest::with('house')
            ->whereIn('status', ['in progress', 'solved'])
            ->paginate(10);

        return view('maintenance.under_maintenance', compact('requests'));
    }

    // Update Status
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:in progress,solved,closed',
        ]);

        $maintenanceRequest = MaintenanceRequest::findOrFail($id);
        $maintenanceRequest->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    // Notify and Move Request from New to Under Maintenance
    public function notify(Request $request, $id)
    {
        $maintenanceRequest = MaintenanceRequest::findOrFail($id);
        $maintenanceRequest->update(['status' => 'in progress']);

        return redirect()->back()->with('success', 'Request has been moved to Under Maintenance.');
    }

    public function index()
    {
    $maintenanceRequests = MaintenanceRequest::with('house')->paginate(10);

    return view('maintenance.index', compact('maintenanceRequests'));
    }

}
