<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class HouseController extends Controller
{
    /**
     * Display a listing of the houses.
     *
     * @return View
     */
    public function index(): View
    {
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    /**
     * Display a list of vacant houses.
     *
     * @return View
     */
    public function vacant(): View
    {
        $houses = House::where('status', 'vacant')->get();
        return view('houses.vacant', compact('houses'));
    }

    /**
     * Display a list of occupied houses.
     *
     * @return View
     */
    public function occupied(): View
    {
        $houses = House::where('status', 'occupied')->get();
        return view('houses.occupied', compact('houses'));
    }

    /**
     * Display a list of houses under maintenance.
     *
     * @return View
     */
    public function underMaintenance(): View
    {
        $houses = House::where('status', 'under maintenance')->get();
        return view('houses.under_maintenance', compact('houses'));
    }

    /**
     * Show the form for creating a new house.
     *
     * @return View
     */
    public function create(): View
    {
        return view('houses.create');
    }

    /**
     * Store a newly created house in storage.
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:vacant,occupied,under maintenance',
        ]);

        House::create($validated);

        return redirect()->route('houses.index')->with('success', 'House created successfully.');
    }

    /**
     * Display the specified house.
     *
     * @param  House  $house
     * @return View
     */
    public function show(House $house): View
    {
        return view('houses.show', compact('house'));
    }

    /**
     * Show the form for editing the specified house.
     *
     * @param  House  $house
     * @return View
     */
    public function edit(House $house): View
    {
        return view('houses.edit', compact('house'));
    }

    /**
     * Update the specified house in storage.
     *
     * @param  Request  $request
     * @param  House  $house
     * @return RedirectResponse
     */
    public function update(Request $request, House $house): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'status' => 'required|string|in:vacant,occupied,under maintenance',
        ]);

        $house->update($validated);

        return redirect()->route('houses.index')->with('success', 'House updated successfully.');
    }

    /**
     * Remove the specified house from storage.
     *
     * @param  House  $house
     * @return RedirectResponse
     */
    public function destroy(House $house): RedirectResponse
    {
        $house->delete();

        return redirect()->route('houses.index')->with('success', 'House deleted successfully.');
    }
}
