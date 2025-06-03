<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\applyTeacher;
use Illuminate\Http\Request;
use App\Http\Requests\adminRequest;
use App\Models\User;
use App\Http\Requests\updateRequest;

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
        $users = User::where('role', 'user')->get();
        return view('admin.users.index', compact('users'));
    }

    public function teachers()
    {
        $teachers = User::where('role', 'teacher')->get();
        return view('admin.teachers.index', compact('teachers'));
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
    public function storeUser(adminRequest $request)
    {
        $validatedData = $request->validated();
        // dd($validatedData);
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);
        return redirect()->route('admin.users')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     */
    public function editUser()
    {
        // dd(request('id'));
        $user = User::findOrFail(request('id'));
        // dd($user);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     */
    public function updateUser(updateRequest $request)
    {
        $validatedData = $request->validated();
        User::findOrFail(request('id'))->update($validatedData);
        return redirect()->route('admin.users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function deleteUser()
    {
        // Logic to delete user
        User::findOrFail(request('id'))->delete();
        return redirect()->back();
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

    /**
     * Show the Applies.
     */
    public function pending()
    {
        $applies = applyTeacher::with('user')->where('status', 'pending')->get()->all();
        foreach ($applies as $apply) {
            $apply->user = User::find($apply->user_id);
        }
        return view('admin.applies.pending', compact('applies'));
    }

    /**
     * Accept the apply.
     */
    public function acceptApply()
    {
        $apply = applyTeacher::findOrFail(request('id'));
        $apply->status = 'accepted';
        $apply->save();
        // dd($apply->user_id);
        User::findOrFail($apply->user_id)->update(['role' => 'teacher']);

        return redirect()->back()->with('success', 'Apply accepted successfully.');
    }

    /**
     * Reject the apply.
     */
    public function rejectApply()
    {
        $apply = applyTeacher::findOrFail(request('id'));
        $apply->status = 'rejected';
        $apply->save();
        ;

        return redirect()->back()->with('success', 'Apply rejected successfully.');
    }

    /**
     * Show the accepted applies.
     */
    public function accepted()
    {
        $applies = applyTeacher::with('user')->where('status', 'accepted')->get()->all();
        foreach ($applies as $apply) {
            $apply->user = User::find($apply->user_id);
        }
        return view('admin.applies.accepted', compact('applies'));
    }
    /**
     * Show the rejected applies.
     */
    public function rejected()
    {
        $applies = applyTeacher::with('user')->where('status', 'rejected')->get()->all();
        foreach ($applies as $apply) {
            $apply->user = User::find($apply->user_id);
        }
        return view('admin.applies.rejected', compact('applies'));
    }
}