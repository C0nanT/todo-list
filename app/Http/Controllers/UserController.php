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
    public function register(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:3',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json(['message' => 'User registered successfully'], 201);
        } catch (ValidationException $e) {
            Log::error('Erro de validação', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Erro ao registrar usuário', ['exception' => $e]);
            return response()->json(['message' => 'Erro ao registrar usuário'], 500);
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

            return response()->json(['token' => $token], 200);
        } catch (ValidationException $e) {
            Log::error('Erro de validação', $e->errors());
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            Log::error('Erro ao logar usuário', ['exception' => $e]);
            return response()->json(['message' => 'Erro ao logar usuário'], 500);
        }
    }

    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Logged out'], 200);
        } catch (\Exception $e) {
            Log::error('Erro ao deslogar usuário', ['exception' => $e]);
            return response()->json(['message' => 'Erro ao deslogar usuário'], 500);
        }
    }

} 