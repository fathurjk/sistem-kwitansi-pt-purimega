<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function update(Request $request)
    {
        $user = auth()->user();

        $oldPassword = $request->get('old_password');
        $newPassword = $request->get('new_password');
        $confirmPassword = $request->get('password_confirmation');

        if (!Hash::check($oldPassword, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect.');
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect()->back()->with('success', 'Password has been changed successfully.');
    }
}