<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ProfileRequest;

class ProfileController extends Controller
{
    public function Profile()
    {
        return view('admin.modules.auth.profile');
    }

    public function updateProfile(Request $request, $id)
    {

        User::updateProfile($id, $request->all());
        return redirect()->route('admin.profile')->with('success', 'Profile Updated Successfully');
    }
    public function changePassword()
    {
        return view('admin.modules.auth.change-password');
    }
    public function updatePassword(Request $request)
    {
        $validData = $request->all();

        $user = Auth::user();

        if (!Hash::check($validData['current_password'], $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect.');
        }

        $user->password = Hash::make($validData['new_password']);
        $user->save();
        Auth::logout();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
