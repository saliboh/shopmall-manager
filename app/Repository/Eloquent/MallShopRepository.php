<?php

namespace App\Repository\Eloquent;

use App\Models\MallShop;

use App\Repository\UserRepositoryInterface;
use Illuminate\Support\Collection;

class MallShopRepository extends BaseRepository implements UserRepositoryInterface
{

   /**
    * MallShopRepository constructor.
    *
    * @param MallShop $model
    */
    public function __construct(MallShop $model)
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
