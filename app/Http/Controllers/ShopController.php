<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Http\Requests\ShopRetrieveRequest;
use App\Http\Requests\ShopVisitRequest;
use App\Models\User;
use App\Services\ShopService;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
     /**
     * @var ShopService $shopService
     */
    private $shopService;

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    /**
     * Only The Door Sensor with Account Store Owner Role can send the data
     */
    public function updateVisits(ShopVisitRequest $request)
    {
        $fields = $request->validated();
        $user = User::find(Auth::user()->id);
        $userShops = $user->shops->pluck('id')->toArray();

        if(Auth::user()->role != User::ROLES['store-owner'])
        {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        if(!in_array($fields['id'], $userShops))
        {
            return response([
                'message' => 'Your do not have permission for this specific store'
            ], 401);
        }

        $result = $this->shopService->updateShopVisitorCount($fields);

        return response($result, 201);
    }

    /**
     * Retrieve all Store owner's store, per floor
     */
    public function retrieveStoresForStoreOwner(ShopRetrieveRequest $request)
    {
        if(Auth::user()->role != User::ROLES['store-owner'])
        {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->retrieveShopsByStoreOwner(Auth::user()->id, $request['floor'] ?? null);

        return response($result, 200);
    }

    /**
     * Retrieve all stores per floor, for Admin (Shop Manager | Super Admin)
     */
    public function retrieveAllStoresForAdmin(ShopRetrieveRequest $request)
    {
        $validatedRequest = $request->validated();

        if($this->isNotAdmin()) {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->retrieveAllStores(Auth::user()->id, $validatedRequest['floor'] ?? null);

        return response($result, 200);
    }

    /**
     * Create
     */
    public function createShop(ShopCreateRequest $request)
    {
        if($this->isNotAdmin()) {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->create($request->validated());

        return response($result, 201);
    }

    private function isNotAdmin(): bool
    {
        return Auth::user()->role != User::ROLES['super-admin'] &&
            Auth::user()->role != User::ROLES['shop-manager'];
    }

}
