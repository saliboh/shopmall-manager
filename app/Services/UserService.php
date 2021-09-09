<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\UserRepository;

/**
 * Class UserService
 */
class UserService
{
    /**
     * @var UserRespository $userRepository
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

    public function delete(array $request): array
    {
        $user = User::find($request['id']);
        $user->shops()->delete();

        return [
            'delete-status' => $user->delete(),
        ];
    }

    public function update(array $request): array
    {
        $user = User::find($request['id']);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->role = $request['role'];

        return [
            'update-status' => $user->save(),
            'user' => $user,
        ];
    }

}
