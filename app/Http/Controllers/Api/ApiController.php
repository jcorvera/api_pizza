<?php

namespace App\Http\Controllers\Api;


use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\login\StoreUserRequest;
use App\Http\Requests\User\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\DB;
use App\User;

class ApiController extends Controller
{   

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function profile()
    {
        return response()->json(new UserResource(auth()->user()),200);
    }

    public function register(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
            DB::commit()
        }catch (\Throwable $e) {
            DB::rollBack();
        }
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
        try {
            JWTAuth::invalidate($request->token);
            return response()->json([
                'success' => true,
                'message' => 'El usuario cerró sesión correctamente'
            ],200);

        } catch (\JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Lo sentimos, el usuario no puede cerrar sesión'
            ], 500);
        }
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => $token,
            'token_type' => 'bearer'
        ],200);
    }

}
