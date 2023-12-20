<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function sign_up(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $user->sendEmailVerificationNotification();

        // Assuming you want to redirect back with a message
        return redirect()->back()->with('success', 'Verification link sent to email');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user || !Hash::check($request->password, $user->password)) {
            // If login fails, return the login view with an error message
            return view('auth.login')->with('error', 'The provided credentials are incorrect.');
        }
    
        $token = $user->createToken('apiToken')->plainTextToken;
    
        // If login succeeds, return a view with the token
        return view('dashboard')->with('token', $token);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        // Assuming you want to redirect back with a success message
        return redirect()->back()->with('success', 'Logged out successfully');
    }
}
