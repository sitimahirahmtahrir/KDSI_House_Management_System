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
