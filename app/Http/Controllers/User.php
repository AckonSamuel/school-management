<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('id', '!=', auth()->user()->id)->get();
            return response()->json($users);
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Failed to retrieve users.'], 500);
        }
    }

    public function show(User $user)
    {
        try {
            return response()->json($user);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'User not found.'], 404);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                // Define your validation rules here
            ]);

            $user = User::create($validatedData);
            return response()->json($user, 201);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->errors()], 422);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Failed to create user.'], 500);
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $validatedData = $request->validate([
                // Define your validation rules here
            ]);

            $user->update($validatedData);
            return response()->json($user);
        } catch (ValidationException $exception) {
            return response()->json(['error' => $exception->errors()], 422);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Failed to update user.'], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'User deleted successfully']);
        } catch (\Exception $exception) {
            return response()->json(['error' => 'Failed to delete user.'], 500);
        }
    }
}
