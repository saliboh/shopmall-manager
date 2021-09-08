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
}
