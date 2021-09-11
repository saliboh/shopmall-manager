<?php

namespace App\Repositories\Eloquent;

use App\Models\Shop;
use App\Repositories\Eloquent\BaseRepository;
use Illuminate\Support\Collection;

class ShopRepository extends BaseRepository
{

   /**
    * UserRepository constructor.
    *
    * @param User $model
    */
   public function __construct(Shop $model)
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

   public function getStoresByStoreOwnerId($userId, $floor = null)
   {
       $query = $this->model->query();

       if($floor != null) {
            $query = $query->where('floor', '=', $floor);
       }

       return $query->where('user_id', '=', $userId)->get();

   }

   public function getStoreByFloorNumber($floor)
   {
       return $this->model->where('floor', '=', $floor)->get();
   }
}
