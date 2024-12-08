<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{
    public function users(): JsonResponse
    {
        try {
            $users = User::query()
                ->get()
                ->toArray();

            return response()->json([
                'status' => true,
                'statusCode' => 200,
                'data' => $users,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'statusCode' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request): JsonResponse
    {
        try {

            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 401);
            }

            $credentials = $request->only('email', 'password');

            if (! Auth::attempt($credentials)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Unauthorized',
                ], 401);
            }

            $user = User::where('email', $request->email)->firstOrFail();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'data' => $user,
                'access_token' => $token,
            ]);

        } catch (Throwable $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function register(Request $request): JsonResponse
    {
        try {
            $validator = Validator::make($request->all(), [
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'name' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validator->errors(),
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);

        } catch (Throwable $error) {
            return response()->json([
                'status' => false,
                'message' => $error->getMessage(),
            ], 500);
        }
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out',
        ]);
    }
}
