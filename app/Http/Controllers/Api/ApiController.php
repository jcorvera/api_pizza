<?php

namespace App\Http\Controllers\Api;


use JWTAuth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\login\StoreUserRequest;
use App\Http\Resources\ProfileResource;
use Illuminate\Support\Facades\DB;
use App\User;

class ApiController extends Controller
{
    public function authenticate(Request $request)
    {
        $token = null;
        $credentials = [
            'email' => $request->input('data.attributes.email'),
            'password' => $request->input('data.attributes.password')
        ];

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }
    
    public function profile()
    {
        return response()->json(new ProfileResource(auth()->user()),200);
    }

    public function register(StoreUserRequest $request)
    {
        try {
            DB::beginTransaction();
                $user = new User();
                $user->name = $request->input('data.attributes.name');
                $user->email = $request->input('data.attributes.email');
                $user->password = bcrypt($request->input('data.attributes.password'));
                $user->save();
            DB::commit();
            return $this->authenticate($request);
        } catch (\Throwable $e) {
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
