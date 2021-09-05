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
    public function index()
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MallShop  $mallShop
     * @return \Illuminate\Http\Response
     */
    public function show(MallShop $mallShop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MallShop  $mallShop
     * @return \Illuminate\Http\Response
     */
    public function edit(MallShop $mallShop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MallShop  $mallShop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MallShop $mallShop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MallShop  $mallShop
     * @return \Illuminate\Http\Response
     */
    public function destroy(MallShop $mallShop)
    {
        //
    }
}
