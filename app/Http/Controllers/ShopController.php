<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShopVisitRequest;
use App\Models\User;
use App\Services\ShopService;
use Illuminate\Http\Request;
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

        $response = $this->shopService->updateShopVisitorCount($fields);

        return response($response, 201);
    }

}
