<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function index()
    {
        $houses = House::all();
        return view('houses.index', compact('houses'));
    }

    public function create()
    {
        return view('houses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'house_number' => 'required|unique:houses',
            'location' => 'required',
            'status' => 'required|in:Vacant,Occupied,Maintenance',
        ]);

        House::create($request->all());
        return redirect()->route('houses.index')->with('success', 'House created successfully.');
    }

    public function edit($id)
    {
        $house = House::findOrFail($id);
        return view('houses.edit', compact('house'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'house_number' => 'required',
            'location' => 'required',
            'status' => 'required|in:Vacant,Occupied,Maintenance',
        ]);

        $house = House::findOrFail($id);
        $house->update($request->all());
        return redirect()->route('houses.index')->with('success', 'House updated successfully.');
    }

    public function destroy($id)
    {
        $house = House::findOrFail($id);
        $house->delete();
        return redirect()->route('houses.index')->with('success', 'House deleted successfully.');
    }
}
