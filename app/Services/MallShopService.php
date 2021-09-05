<?php

namespace App\Services;

use App\Repository\Eloquent\MallShopRepository;

/**
 * Class UserService
 */
class MallShopService
{
    /**
     * @var MallShopRepository $mallShopRepository
     */
    private $userRepository;

    public function __construct(MallShopRepository $mallShopRepository)
    {
        $this->mallShopRepository = $mallShopRepository;
    }

    public function addStoreVisitCount(array $request)
    {
        $shop =  $this->mallShopRepository->find($request['shopmall_id']);

        if(is_null($shop->store_visits)) {
            $shop->store_visits = 1;
        }
        else {
            $shop->store_visits++;
        }

        $shop->save();

        return $shop;
    }

}
