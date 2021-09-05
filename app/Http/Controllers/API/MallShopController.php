<?php

namespace App\Http\Controllers\API;

use App\Models\MallShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return array_reverse($shops);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
