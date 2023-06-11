<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Authenticate route
     */
    public function __construct()
    {
        $this->middleware('auth.routes:admin,api,client', ['except' => ['adminLogin', 'userLogin', 'clientLogin']]);
    }

    /**
     * User login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->guard('admin')->attempt($credentials)) {
            return response()->json(['data' => ['msg' => 'Login inválido!']], 401);
        }

        $admin = auth()->guard('admin')->user();

        $customClaims = [
            'id' => $admin->id,
            'name' => $admin->name,
            'email' => $admin->email,
            'loggedInAs' => 'admin'
        ];

        $token = JWTAuth::claims($customClaims)->fromUser($admin);

        return $this->respondWithToken($token);
    }

    /**
     * User login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function userLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['data' => ['msg' => 'Login inválido!']], 401);
        }

        $user = auth()->user();

        $customClaims = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'loggedInAs' => 'user'
        ];

        $token = JWTAuth::claims($customClaims)->fromUser($user);

        return $this->respondWithToken($token);
    }

    /**
     * Client login.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function clientLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        $credentials = $request->only(['phone', 'password']);

        if (!$token = auth()->guard('client')->attempt($credentials)) {
            return response()->json(['data' => ['msg' => 'Login inválido!']], 401);
        }

        $client = auth()->guard('client')->user();

        $customClaims = [
            'id' => $client->id,
            'name' => $client->name,
            'phone' => $client->phone,
            'loggedInAs' => 'client'
        ];

        $token = JWTAuth::claims($customClaims)->fromUser($client);

        return $this->respondWithToken($token);
    }

    /**
     * Logout for all users.
     *
     * @return void
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['data' => ['msg' => 'Deslogado com sucesso!']]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
