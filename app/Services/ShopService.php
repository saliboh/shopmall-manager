<?php

namespace App\Services;

use App\Models\Shop;
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
    private $shopRepository;

    public function __construct(ShopRepository $shopRepository)
    {
        $this->shopRepository = $shopRepository;
    }

    public function updateShopVisitorCount(array $request): array
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

    public function retrieveShopsByStoreOwner($userId, $floor = null): array
    {
        $shops = $this->shopRepository->getStoresByStoreOwnerId($userId, $floor)->toArray();

        return([
            'requester-user-id' => $userId,
            'requester-user-role' => Auth::user()->role,
            'total-stores' => count($shops),
            'shops' => $shops,
        ]);
    }

    public function retrieveAllStores($userId, $floor): array
    {
        if($floor == null) {
            $shops = $this->shopRepository->all()->toArray();
        }
        else {
            $shops = $this->shopRepository->getStoreByFloorNumber($floor);
        }

        return([
            'floor' => $floor,
            'requester-user-id' => $userId,
            'requester-user-role' => Auth::user()->role,
            'total-stores' => count($shops),
            'shops' => $shops,
        ]);
    }

    public function create(array $request): array
    {
        $request['visit'] = 0;
        $shop = Shop::create($request);

        return([
            'requester-user-id' => Auth::user()->id,
            'requester-user-role' => Auth::user()->role,
            'data' => $shop,
        ]);
    }

    public function delete(array $request): array
    {
        $shop = Shop::find($request['id']);
        $status = $shop->delete();

        return([
            'requester-user-id' => Auth::user()->id,
            'requester-user-role' => Auth::user()->role,
            'delete-status' => $status,
        ]);
    }

    public function update(array $request): array
    {
        $shop = Shop::find($request['id']);
        $shop->user_id = $request['user_id'];
        $shop->name = $request['name'];
        $shop->visit = $request['visit'];
        $shop->floor = $request['floor'];

        return([
            'requester-user-id' => Auth::user()->id,
            'requester-user-role' => Auth::user()->role,
            'update-status' => $shop->save(),
        ]);
    }
}
