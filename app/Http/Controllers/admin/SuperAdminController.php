<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Models\User;

class SuperAdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Display the list of users.
     */
    public function users()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new user.
     */
    public function createUser()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created user in storage.
     */
    public function storeUser(userRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified user.
     */
    public function editUser($id)
    {
        return view('admin.users.edit', compact('id'));
    }

    /**
     * Update the specified user in storage.
     */
    public function updateUser(Request $request, $id)
    {
        // Logic to update user
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function deleteUser($id)
    {
        // Logic to delete user
        return redirect()->route('admin.users')->with('success', 'User deleted successfully.');
    }
    /**
     * Show the admin profile.
     */
    public function profile()
    {
        return view('admin.profile');
    }
    /**
     * Update the admin profile.
     */
    public function updateProfile(Request $request)
    {
        // Logic to update profile
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}
