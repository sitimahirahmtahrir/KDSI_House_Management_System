<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuestVisit;
use Illuminate\Support\Facades\Auth;

class PulapolController extends Controller
{
    // View the list of guest visits pending verification
    public function viewGuestVisits()
    {
        $guestVisits = GuestVisit::where('verification_status', 'pending')->get();
        return view('pulapol.dashboard', compact('guestVisits'));
    }

    // Verify a guest visit
    public function verifyGuestVisit(Request $request, $id)
    {
        $guestVisit = GuestVisit::findOrFail($id);

        $request->validate([
            'verification_status' => 'required|in:verified,not_verified',
        ]);

        $guestVisit->update([
            'verification_status' => $request->verification_status,
        ]);

        return redirect()->route('pulapol.dashboard')->with('success', 'Guest visit status updated successfully!');
    }

    // Pulapol Dashboard Index
    public function index()
    {
        // Fetch pending guest visits
        $guestVisits = GuestVisit::where('verification_status', 'pending')->get();

        // Pass the data to the dashboard view
        return view('pulapol.dashboard', compact('guestVisits'));
    }
}
