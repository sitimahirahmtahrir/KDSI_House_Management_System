<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;
use App\Models\MaintenanceRequest;


class HouseController extends Controller
{
    public function underMaintenance()
    {
    $requests = MaintenanceRequest::with('house')
        ->where('status', 'in progress')
        ->paginate(10);

    return view('houses.under_maintenance', compact('requests'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'status' => 'required|in:vacant,occupied,under maintenance',
        ]);

        House::create($request->all());

        return redirect()->route('houses.index')->with('success', 'House added successfully.');
    }

    public function edit(House $house)
    {
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, House $house)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'status' => 'required|in:vacant,occupied,under maintenance',
        ]);

        $house->update($request->all());

        return redirect()->route('houses.index')->with('success', 'House updated successfully.');
    }

    public function show($id)
    {
        $house = House::findOrFail($id); // Retrieve the house by ID or throw a 404 error
        return view('houses.show', compact('house')); // Pass the house data to a 'show' Blade file
    }

    public function index()
    {
        $houses = House::with('resident')->get(); // Load resident data with houses
        $totalHouses = $houses->count();
        $vacantHouses = $houses->where('status', 'vacant')->count();
        $occupiedHouses = $houses->where('status', 'occupied')->count();

        return view('houses.index', compact('houses', 'totalHouses', 'vacantHouses', 'occupiedHouses'));
    }

}


