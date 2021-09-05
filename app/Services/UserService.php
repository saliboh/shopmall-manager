<?php

namespace App\Services;

use App\Models\User;
use App\Repository\Eloquent\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

/**
 * Class UserService
 */
class UserService
{
    /**
     * @var UserRepository $userRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAllExceptUserHavingThisId($userId)
    {
        return $this->userRepository->getAllExceptUserId($userId)->toArray();
    }

    public function updateUser(int $id, Request $request)
    {
        $user =  $this->userRepository->find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        $user->save();

        return $user;
    }

    public function registerUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);

        $user->save();

        return $user;
    }

}
