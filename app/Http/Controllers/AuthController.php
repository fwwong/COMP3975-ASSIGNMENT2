<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->verified == 1) {
                // User is verified, continue with login
                return redirect()->intended('/dashboard');
            } else {
                // User is not verified, show message
                return redirect()->route('login')->withInput()->with('error', 'Please verify your email to login.');
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
    
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
    
}
