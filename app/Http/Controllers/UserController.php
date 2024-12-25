<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all();
        return inertia('Users/Index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        return inertia('Users/Create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone_number' => 'required|string|max:15',
            'role' => 'required|in:admin,staff,guest',
        ]);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'full_name' => $validated['full_name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'role' => $validated['role'],
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return inertia('Users/Edit', ['user' => $user]);
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:15',
            'role' => 'required|in:admin,staff,guest',
        ]);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
