<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function updateAdmin(Request $request, $user_id)
    {
        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user = User::findOrFail($user_id);

        

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'Password has been changed successfully.');
    }

    public function updateMe(Request $request){
        $user = auth()->user();

        $newPassword = $request->get('new_password');
        $confirmPassword = $request->get('password_confirmation');

       

        $user->password = Hash::make($newPassword);
        $user->save();

        return redirect()->back()->with('success', 'Password has been changed successfully.');
    }
}