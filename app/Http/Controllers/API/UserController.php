<?php

namespace App\Http\Controllers\API;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * @var UserService $userService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService
            ->getAllExceptUserHavingThisId(Auth::user()->id);

        return array_reverse($users);
    }

    public function edit($id)
    {
        $user = User::find($id);
        $user->password = '';

        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        try {
            $user = $this->userService->updateUser($id, $request);
            $success = true;
            $message = 'The user is successfully updated';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
            $user = [];
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
            'user' => $user,
        ]);
    }

    public function delete($id)
    {
        $book = User::find($id);
        $book->delete();

        return response()->json('The book successfully deleted');
    }

    /**
     * Register
     */
    public function register(Request $request)
    {
        try {
            $this->userService->registerUser($request);

            $success = true;
            $message = 'User register successfully';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    /**
     * Login
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $success = true;
            $message = 'User login successfully';
        } else {
            $success = false;
            $message = 'Unauthorised';
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }

    /**
     * Logout
     */
    public function logout()
    {
        try {
            Session::flush();
            $success = true;
            $message = 'Successfully logged out';
        } catch (\Illuminate\Database\QueryException $ex) {
            $success = false;
            $message = $ex->getMessage();
        }

        // response
        $response = [
            'success' => $success,
            'message' => $message,
        ];
        return response()->json($response);
    }
}
