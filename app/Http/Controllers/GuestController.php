<?php

namespace App\Http\Controllers;

use App\Models\GuestVisit;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class GuestController extends Controller
{
    /**
     * Display a listing of all guest visits.
     *
     * @return View
     */
    public function index(): View
    {
        $guests = GuestVisit::all();
        return view('guests.index', compact('guests'));
    }

    /**
     * Display a list of guest visits for today.
     *
     * @return View
     */
    public function visitsToday(): View
    {
        $guests = GuestVisit::whereDate('check_in_time', now()->toDateString())->get();
        return view('guests.today', compact('guests'));
    }

    /**
     * Show the form for creating a new guest visit.
     *
     * @return View
     */
    public function create(): View
    {
        return view('guests.create');
    }

    /**
     * Store a newly created guest visit in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'house_id' => 'required|exists:houses,id',
            'check_in_time' => 'required|date',
            'check_out_time' => 'nullable|date|after:check_in_time',
            'verification_status' => 'required|string|in:verified,not verified',
        ]);

        GuestVisit::create($validated);

        return redirect()->route('guests.index')->with('success', 'Guest visit recorded successfully.');
    }

    /**
     * Display the specified guest visit.
     *
     * @param  GuestVisit  $guest
     * @return View
     */
    public function show(GuestVisit $guest): View
    {
        return view('guests.show', compact('guest'));
    }

    /**
     * Show the form for editing the specified guest visit.
     *
     * @param  GuestVisit  $guest
     * @return View
     */
    public function edit(GuestVisit $guest): View
    {
        return view('guests.edit', compact('guest'));
    }

    /**
     * Update the specified guest visit in storage.
     *
     * @param  Request  $request
     * @param  GuestVisit  $guest
     * @return RedirectResponse
     */
    public function update(Request $request, GuestVisit $guest): RedirectResponse
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'house_id' => 'required|exists:houses,id',
            'check_in_time' => 'required|date',
            'check_out_time' => 'nullable|date|after:check_in_time',
            'verification_status' => 'required|string|in:verified,not verified',
        ]);

        $guest->update($validated);

        return redirect()->route('guests.index')->with('success', 'Guest visit updated successfully.');
    }

    /**
     * Remove the specified guest visit from storage.
     *
     * @param  GuestVisit  $guest
     * @return RedirectResponse
     */
    public function destroy(GuestVisit $guest): RedirectResponse
    {
        $guest->delete();

        return redirect()->route('guests.index')->with('success', 'Guest visit deleted successfully.');
    }
}
