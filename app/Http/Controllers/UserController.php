<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaintenanceRequest;
use App\Models\Guest;
use App\Models\GuestVisit;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Submit a new maintenance request
    public function submitMaintenanceRequest(Request $request)
    {
        $request->validate([
            'house_id' => 'required|exists:houses,id',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $maintenance = MaintenanceRequest::create([
            'user_id' => Auth::id(),
            'house_id' => $request->house_id,
            'description' => $request->description,
            'image_url' => $request->file('image') ? $request->file('image')->store('maintenance', 'public') : null,
            'status' => 'pending',
        ]);

        return response()->json(['message' => 'Maintenance request submitted successfully!', 'data' => $maintenance]);
    }

    // View maintenance request statuses
    public function viewMaintenanceRequests()
    {
        $requests = MaintenanceRequest::where('user_id', Auth::id())->get();
        return response()->json(['data' => $requests]);
    }

    //View House status
    public function viewHouseStatus()
    {
    $house = House::where('id', Auth::user()->house_id)->first();
    return response()->json(['data' => $house->status]);
    }


    // Submit guest visit details
    public function submitGuestDetails(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'house_id' => 'required|exists:houses,id',
            'check_in_time' => 'required|date',
        ]);

        $guest = Guest::create([
            'name' => $request->guest_name,
        ]);

        $guestVisit = GuestVisit::create([
            'guest_id' => $guest->id,
            'house_id' => $request->house_id,
            'check_in_time' => $request->check_in_time,
            'verification_status' => 'pending',
        ]);

        return response()->json(['message' => 'Guest details submitted successfully!', 'data' => $guestVisit]);
    }

    // View announcements
    public function viewAnnouncements()
    {
        $announcements = Announcement::orderBy('created_at', 'desc')->get();
        return response()->json(['data' => $announcements]);
    }
}

class PulapolController extends Controller
{
    // View the list of guest visits
    public function viewGuestVisits()
    {
        $guestVisits = GuestVisit::where('verification_status', 'pending')->get();
        return response()->json(['data' => $guestVisits]);
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

        return response()->json(['message' => 'Guest visit status updated successfully!', 'data' => $guestVisit]);
    }

    // Change password (optional for Pulapol role)
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect.'], 400);
        }

        $user->update(['password' => bcrypt($request->new_password)]);

        return response()->json(['message' => 'Password updated successfully!']);
    }

    public function index()
{
    // Fetch maintenance requests for the logged-in user
    $maintenanceRequests = MaintenanceRequest::where('user_id', Auth::id())->get();

    // Fetch guest requests for the logged-in user
    $guestRequests = GuestVisit::where('user_id', Auth::id())->get();

    // Fetch all announcements
    $announcements = Announcement::orderBy('created_at', 'desc')->get();

    // Fetch the house status for the logged-in user's house
    $house = House::where('id', Auth::user()->house_id)->first();
    $houseStatus = $house ? $house->status : 'Not Assigned';

    // Pass all the data to the User Dashboard view
    return view('user.dashboard', compact('maintenanceRequests', 'guestRequests', 'announcements', 'houseStatus'));
}

}
