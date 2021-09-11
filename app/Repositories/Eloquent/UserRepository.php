<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;

class UserRepository extends BaseRepository
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(User $model)
   {
       parent::__construct($model);
   }

   /**
    * @return Collection
    */
   public function all(): Collection
   {
       return $this->model->all();
   }

   public function getAllExceptUserId($userId)
    {
        return $this->model
            ->where('id', '!=', $userId)
            ->where('role', '!=', 'super-admin')
            ->get();
    }
}
