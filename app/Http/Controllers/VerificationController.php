<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function showVerificationForm()
    {
        return view('auth.verify');
    }

    public function verify(Request $request)
    {
        $request->validate([
            // 'email' => 'required|email|exists:users,email',
            'verification_code' => 'required|string',
        ]);

        $user = User::where('verification_code', $request->verification_code)
                    ->first();

        

        if ($user) {
            $user->is_verified = true;
            $user->verification_code = null; // Clear code after verification
            $user->save();

            //login the user
            auth()->login($user);

            return redirect()->route('dashboard')->with('success', 'Your account has been verified successfully');
        }

        return back()->with('error', 'Invalid verification code');
    }
}
