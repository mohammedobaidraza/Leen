<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    //

    public function profile_home()
    {
        return view('user.profile');
    }

    public function edit_get(){
        return view('user.profile_edit');
    }
    public function update(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'. Auth::id(),
            'major_in_university' => 'nullable|string|max:255'
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Update the user's information
        $user->update($data);

        // Redirect back or to a specified route with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

}
