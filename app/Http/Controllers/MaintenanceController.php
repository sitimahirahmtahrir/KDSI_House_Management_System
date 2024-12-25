<?php

namespace App\Http\Controllers;

use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of all maintenance requests with summary data.
     *
     * @return View
     */
    public function index(): View
    {
        $requests = MaintenanceRequest::with('house')->get();
        $totalRequests = $requests->count();
        $inProgressRequests = $requests->where('status', 'in progress')->count();
        $completedRequests = $requests->where('status', 'completed')->count();

        return view('maintenance.index', [
            'requests' => $requests,
            'totalRequests' => $totalRequests,
            'inProgressRequests' => $inProgressRequests,
            'completedRequests' => $completedRequests,
        ]);
    }

    /**
     * Display a list of pending maintenance requests.
     *
     * @return View
     */
    public function pending(): View
    {
        $requests = MaintenanceRequest::where('status', 'pending')->get();
        return view('maintenance.pending', compact('requests'));
    }

    /**
     * Display a list of in-progress maintenance requests.
     *
     * @return View
     */
    public function inProgress(): View
    {
        $requests = MaintenanceRequest::where('status', 'in progress')->get();
        return view('maintenance.in_progress', compact('requests'));
    }

    /**
     * Display a list of completed maintenance requests.
     *
     * @return View
     */
    public function completed(): View
    {
        $requests = MaintenanceRequest::where('status', 'completed')->get();
        return view('maintenance.completed', compact('requests'));
    }

    /**
     * Show the form for creating a new maintenance request.
     *
     * @return View
     */
    public function create(): View
    {
        return view('maintenance.create');
    }

    /**
     * Store a newly created maintenance request in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'house_id' => 'required|exists:houses,id',
            'description' => 'required|string|max:1000',
            'status' => 'required|string|in:pending,in progress,completed',
        ]);

        MaintenanceRequest::create($validated);

        return redirect()->route('maintenance.index')->with('success', 'Maintenance request created successfully.');
    }

    /**
     * Display the specified maintenance request.
     *
     * @param  MaintenanceRequest  $request
     * @return View
     */
    public function show(MaintenanceRequest $request): View
    {
        return view('maintenance.show', compact('request'));
    }

    /**
     * Show the form for editing the specified maintenance request.
     *
     * @param  MaintenanceRequest  $request
     * @return View
     */
    public function edit(MaintenanceRequest $request): View
    {
        return view('maintenance.edit', compact('request'));
    }

    /**
     * Update the specified maintenance request in storage.
     *
     * @param  Request  $request
     * @param  MaintenanceRequest  $maintenanceRequest
     * @return RedirectResponse
     */
    public function update(Request $request, MaintenanceRequest $maintenanceRequest): RedirectResponse
    {
        $validated = $request->validate([
            'house_id' => 'required|exists:houses,id',
            'description' => 'required|string|max:1000',
            'status' => 'required|string|in:pending,in progress,completed',
        ]);

        $maintenanceRequest->update($validated);

        return redirect()->route('maintenance.index')->with('success', 'Maintenance request updated successfully.');
    }

    /**
     * Remove the specified maintenance request from storage.
     *
     * @param  MaintenanceRequest  $maintenanceRequest
     * @return RedirectResponse
     */
    public function destroy(MaintenanceRequest $maintenanceRequest): RedirectResponse
    {
        $maintenanceRequest->delete();

        return redirect()->route('maintenance.index')->with('success', 'Maintenance request deleted successfully.');
    }
}
