<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function signUp(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);
    
            User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password'])
            ]);
    
            // Send verification email or perform any other necessary action
            return redirect()->back()->with('success', 'Verification link sent to email');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Error creating user.');
        }
    }
    
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string',
                'password' => 'required|string',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return view('auth.login')->withErrors(['error' => 'The provided credentials are incorrect.']);
            }

            $token = $user->createToken('apiToken')->plainTextToken;

            // Set the token as a cookie for subsequent API requests
            return redirect()->route('home')->cookie('api_token', $token, 60 * 24);
        } catch (\Exception $e) {
            return view('auth.login')->withErrors(['error' => 'Login failed. Please try again.']);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete(); // Revoke all tokens for the user
            return redirect('/login')->withCookie(cookie()->forget('api_token'))->with('success', 'Logged out successfully');
        } catch (\Exception $e) {
            return redirect('/')->withErrors(['error' => 'Logout failed. Please try again.']);
        }
    }
}
