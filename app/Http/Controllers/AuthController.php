<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role;

            if ($user->verified == 1) {
                $role = $user->role;
                Session::put('role', $role);

                if ($role == 'admin') {
                    // if user is admin, redirect to admin dashboard
                    return redirect()->intended('/dashboard');
                } else {
                    return redirect()->intended('/client');
                }
            } else {
                // User is not verified, show message
                return redirect()->route('login')->withInput()->with('error', 'Please wait for your account to be verified.');
            }
        }

        // User not found or invalid credentials
        return redirect()->route('login')->withInput()->with('error', 'Invalid email or password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::forget('role');
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    public function index()
    {
        $users = User::all();
        return view('auth.dashboard', compact('users'));
    }

    public function updateVerification(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        // Validate the request
        $request->validate([
            'verified' => 'required|boolean',
        ]);

        // Update the user's verification status
        $user->verified = $request->input('verified');
        $user->save();

        return redirect()->back()->with('success', 'User verification status updated successfully.');
    }
}
