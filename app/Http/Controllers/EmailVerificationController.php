<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    // Verify the user's email
    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'Invalid verification link'], 400);
        }

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['message' => 'Invalid verification link'], 400);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified']);
        }

        $user->markEmailAsVerified();
        event(new Verified($user));

        return Redirect::to('/verified');
    }

    // Resend email verification link
    public function resend(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json(['message' => 'Email already verified']);
        }

        $user->sendEmailVerificationNotification();

        return response()->json(['message' => 'Verification email sent']);
    }
}
