<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Eloquent\ShopRepository;
use Illuminate\Support\Facades\Auth;

/**
 * Class ShopService
 */
class ShopService
{
    /**
     * @var MallShopRepository $shopRepository
     */
    private $userRepository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    public function updateShopVisitorCount(array $request)
    {
        $shop =  $this->shopRepository->find($request['id']);
        $shopCountBeforeUpdate = $shop->visit;

        if(is_null($shop->visit)) {
            $shop->visit = 1;
        }
        else {
            $shop->visit += $request['visit'];
        }

        $shop->save();

        $user = User::find(Auth::user()->id);

        return [
            'fields' => $request,
            'user-role' => $user->role,
            'store-owned-ids' => $user->shops->pluck('id'),
            'store-owner' =>  $user->id. ':'.$user->email,
            'shop-after-update' => $shop->visit,
            'shop-before-update' => $shopCountBeforeUpdate,
        ];
    }

}
