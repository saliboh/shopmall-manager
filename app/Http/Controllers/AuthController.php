<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests\AuthUserLoginRequest;
use App\Http\Requests\AuthUserRegisterRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(AuthUserRegisterRequest $request)
    {
        if(Auth::user()->role != 'super-admin')
        {
            return response([
                'message' => 'Your role is not allowed to do this action'
            ], 401);
        }

        $fields = $request->validated();

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'role' => $fields['role'],
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
            'Role' => Auth::user()->role,
        ];

        return response($response, 201);
    }

    public function login(AuthUserLoginRequest $request) {
        $fields = $request->validated();

        $user = User::where('email', $fields['email'])->first();

        if (Auth::attempt($fields)) {
            $success = true;
            $message = 'User login successfully';
            $token = $user->createToken('myapptoken')->plainTextToken;
        } else {
            $success = false;
            $message = 'Bad Credentials';
            $token = null;
        }

        $response = [
            'user' => $user,
            'token' => $token,
            'success' => $success,
            'message' => $message
        ];

        return response()->json($response);
    }

    public function logout(Request $request) {

        try {
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
            auth()->user()->tokens()->delete();
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        $response = [
            'success' => $success,
            'message' => $message,
        ];

        return response()->json($response);
    }
}
