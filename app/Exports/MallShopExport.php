<?php

namespace App\Exports;

use App\Models\MallShop;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class MallShopExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $shops = MallShop::all();

        if(!Auth::user()) {
            return new Collection();
        }

        if(Auth::user()->role == User::ROLES['store-owner']) {
            $shops = MallShop::where('user_id', '=', Auth::user()->id)->get();
        }

        return $shops;
    }

    public function export()
    {
        return Excel::download(new DisneyplusExport, 'disney.xlsx');
    }
}
