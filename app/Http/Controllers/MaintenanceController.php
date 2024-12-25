<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceRequest;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the maintenance requests.
     */
    public function index()
    {
        $maintenanceRequests = MaintenanceRequest::all();
        return view('maintenance.index', compact('maintenanceRequests'));
    }

    /**
     * Show the form for creating a new maintenance request.
     */
    public function create()
    {
        return view('maintenance.create');
    }

    /**
     * Store a newly created maintenance request in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'house_id' => 'required|integer|exists:houses,id',
            'description' => 'required|string|max:255',
            'status' => 'required|string|in:Pending,In Progress,Completed',
        ]);

        MaintenanceRequest::create($validatedData);

        return redirect()->route('maintenance.index')->with('success', 'Maintenance request created successfully.');
    }

    /**
     * Show the form for editing the specified maintenance request.
     */
    public function edit($id)
    {
        $maintenanceRequest = MaintenanceRequest::findOrFail($id);
        return view('maintenance.edit', compact('maintenanceRequest'));
    }

    /**
     * Update the specified maintenance request in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'house_id' => 'required|integer|exists:houses,id',
            'description' => 'required|string|max:255',
            'status' => 'required|string|in:Pending,In Progress,Completed',
        ]);

        $maintenanceRequest = MaintenanceRequest::findOrFail($id);
        $maintenanceRequest->update($validatedData);

        return redirect()->route('maintenance.index')->with('success', 'Maintenance request updated successfully.');
    }

    /**
     * Remove the specified maintenance request from storage.
     */
    public function destroy($id)
    {
        $maintenanceRequest = MaintenanceRequest::findOrFail($id);
        $maintenanceRequest->delete();

        return redirect()->route('maintenance.index')->with('success', 'Maintenance request deleted successfully.');
    }
}
