<?php

namespace App\Http\Controllers\API;

use App\Models\MallShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MallShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): array
    {
        $shops = MallShop::all()->toArray();

        if(Auth::user()->role == User::ROLES['store-owner']) {
            $shops = MallShop::where('user_id', '=', Auth::user()->id)->get()->toArray();
            $shops['role'] = User::ROLES['store-owner'];
        }

        return array_reverse($shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportCsv()
    {

    }

}
