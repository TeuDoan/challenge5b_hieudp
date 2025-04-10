<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $teachers = User::where('is_teacher', 1)->get();
        $students = User::where('is_teacher', 0)->get();
        return view("dashboard.index", ["teachers" => $teachers, "students" => $students]);
    }

    public function show($uuid)
    {
        $messages = collect(); // Default to an empty collection
        // Check if the current user is the owner
        $isOwner = Auth::check() && Auth::user()->uuid === $uuid;
        $isTeacher = session(key: 'is_teacher'); // Returns 1 or 0

        // Fetch the user with appropriate relationships
        $user = User::where('uuid', $uuid)->firstOrFail();

        if (Auth::check()) {

            if ($isOwner) {
                // Load received messages for the owner
                $user->load('receivedMessages.sender');
                $messages = $user->receivedMessages;
            } else {

                // Load sent messages from owner to the current profile showing
                $user->load('sentMessages.recipient');
                $messages = Messages::where('sender_uuid', Auth::user()->uuid)
                    ->where('recipient_uuid', $uuid)
                    ->with('sender', 'recipient')
                    ->get();
            }
        }
        return view("profile.show", ["user" => $user, "messages" => $messages, "isOwner" => $isOwner, "isTeacher" => $isTeacher]);
    }

    public function edit($uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $isTeacher = session(key: 'is_teacher'); // Returns 1 or 0
        $isOwner = Auth::check() && Auth::user()->uuid === $uuid;

        // Ensure only the owner or teacher can edit their profile
        if (!$isOwner && !$isTeacher) {
            abort(403, 'Only Teacher or Profile Owner can Edit!');
        }

        return view('profile.edit', ['user' => $user]);
    }

    public function update(Request $request, $uuid)
    {
        $user = User::where('uuid', $uuid)->firstOrFail();
        $isTeacher = session(key: 'is_teacher'); // Returns 1 or 0
        $isOwner = Auth::check() && Auth::user()->uuid === $uuid;

        // Ensure only the owner can update their profile
        // Ensure only the owner or teacher can edit their profile
        if (!$isOwner && !$isTeacher) {
            abort(403, 'Only Teacher or Profile Owner can Edit!');
        }

        // Validation rules
        $rules = [
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'profile_picture' => 'nullable|image|max:2048',
            'phonenumber' => 'nullable|string|max:15',
        ];

        if ($user->is_teacher) {
            $rules['fullname'] = 'required|string|max:255';
            $rules['username'] = 'required|string|max:255|unique:users,username,' . $user->id;
        }

        $validated = $request->validate($rules);

        // Prepare update data
        $updateData = [
            'email' => $validated['email'],
            'phonenumber' => $validated['phonenumber'] ?? $user->phonenumber,
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = bcrypt($validated['password']);
        }

        if ($user->is_teacher) {
            $updateData['fullname'] = $validated['fullname'];
            $updateData['username'] = $validated['username'];
        }
        
        // Handle profile picture
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = $user->uuid . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/img'), $filename);

            $updateData['profile_picture'] = $filename;
        }

        // Final update
        $user->update($updateData);

        return redirect()->route('profile.show', $user->uuid)->with('success', 'Profile updated successfully!');
    }

    public function store()
    {

    }

}
