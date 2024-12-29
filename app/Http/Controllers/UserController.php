<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:3',
            ]);

            if (User::where('email', $request->email)->exists()) {
                return response()->json([
                    'message' => 'Email already exists'
                ], 409);
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'image' => $request->image ?? 'https://media.istockphoto.com/id/1778959510/pt/foto/two-cute-dogs-playing-in-backyard.jpg?s=2048x2048&w=is&k=20&c=Hz8ti09dqFclFtarVOWl_C_jb50ia-qmAK0daGxQv-M=',
                'permission' => $request->permission ?? 'common'
            ]);

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken($user->email)->plainTextToken;

            return response()->json([
                'status' => 'success',
                'token' => $token,
                'message' => 'User registered successfully'
            ], 201);
        } catch (ValidationException $e) {
            Log::error('Validation error', $e->errors());
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error registering user', ['exception' => $e]);
            return response()->json(['message' => 'Error registering user'], 500);
        }
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json(['message' => 'Unauthorized'], 401);
            }

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken($user->email)->plainTextToken;

            return response()->json([
                'status' => 'success',
                'token' => $token
            ], 200);
        } catch (ValidationException $e) {
            Log::error('Validation error', $e->errors());
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation error'
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error logging in user', ['exception' => $e]);
            return response()->json(['message' => 'Error logging in user'], 500);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Logged out'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error logging out user', ['exception' => $e]);
            return response()->json(['message' => 'Error logging out user'], 500);
        }
    }

    public function index(): JsonResponse
    {
        try {
            $users = User::all();
            return response()->json([
                'status' => 'success',
                'users' => $users
            ], 200);
        } catch (\Exception $e) {
            Log::error('Error fetching users', ['exception' => $e]);
            return response()->json(['message' => 'Error fetching users'], 500);
        }
    }

} 