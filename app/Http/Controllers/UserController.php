<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDeleteRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role != 'super-admin')
        {
            return response([
                'message' => 'Your role is not allowed to do this action'
            ], 401);
        }

        $users = $this->userService
            ->getAllExceptUserHavingThisId(Auth::user()->id);

        return response()->json($users);
    }

    public function edit($id)
    {
        if (Auth::user()->role != User::ROLES['super-admin'])
        {
            return response([
                'message' => 'Your role is not allowed to do this action'
            ], 401);
        }

        $users = User::find($id)->toArray();

        return response()->json($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request)
    {
        if (Auth::user()->role != 'super-admin')
        {
            $response = [
                'message' => 'Your role is not allowed to do this action'
            ];

            return response()->json($response, 401);
        }

        $response = [
            'result' => $this->userService->update($request->validated()),
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserDeleteRequest $request)
    {
        if (Auth::user()->role != 'super-admin')
        {
            return response([
                'message' => 'Your role is not allowed to do this action'
            ], 401);
        }

        return response(
            $this->userService->delete($request->validated(), 200)
        );
    }
}
