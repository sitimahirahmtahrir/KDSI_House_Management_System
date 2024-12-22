<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceRequest;

class MaintenanceController extends Controller
{
    public function index()
    {
        $maintenanceRequests = MaintenanceRequest::all();
        return view('maintenance.index', compact('maintenanceRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('description');
        $data['status'] = 'Pending';
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('maintenance_images', 'public');
        }

        MaintenanceRequest::create($data);

        return redirect('/maintenance-requests')->with('success', 'Maintenance request submitted successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Pending,In Progress,Resolved',
        ]);

        $maintenanceRequest = MaintenanceRequest::findOrFail($id);
        $maintenanceRequest->update(['status' => $request->status]);

        return redirect('/maintenance-requests')->with('success', 'Maintenance request updated successfully.');
    }
}
