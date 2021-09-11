<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopCreateRequest;
use App\Http\Requests\ShopDeleteRequest;
use App\Http\Requests\ShopRetrieveRequest;
use App\Http\Requests\ShopUpdateRequest;
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

    public function create(ShopCreateRequest $request)
    {
        if($this->isNotAdmin()) {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->create($request->validated());

        return response($result, 201);
    }

    public function update(ShopUpdateRequest $request)
    {
        if($this->isNotAdmin()) {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->update($request->validated());

        return response($result, 200);
    }

    public function destroy(ShopDeleteRequest $request)
    {
        if($this->isNotAdmin()) {
            return response([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->delete($request->validated());

        return response($result, 200);
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

        return response()->json($result, 200);
    }

    /**
     * Retrieve all stores per floor, for Admin (Shop Manager | Super Admin)
     */
    public function retrieveAllStoresForAdmin(ShopRetrieveRequest $request)
    {
        $validatedRequest = $request->validated();

        if($this->isNotAdmin()) {
            return response()->json([
                'message' => 'Your do not have the right role to do this task'
            ], 401);
        }

        $result = $this->shopService->retrieveAllStores(Auth::user()->id, $validatedRequest['floor'] ?? null);

        return response()->json($result, 200);
    }

    private function isNotAdmin(): bool
    {
        return Auth::user()->role != User::ROLES['super-admin'] &&
            Auth::user()->role != User::ROLES['shop-manager'];
    }

}
