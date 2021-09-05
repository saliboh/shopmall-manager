<?php

namespace App\Http\Controllers;

use App\Models\MallShop;
use App\Http\Controllers\Controller;
use App\Http\Requests\MallShopVisitRequest;
use App\Models\User;
use App\Services\MallShopService;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MallShopExport;

class MallShopController extends Controller
{
    /**
     * @var MallShopService $mallShopService
     */
    private $mallShopService;

    public function __construct(MallShopService $mallShopService)
    {
        $this->mallShopService = $mallShopService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function exportCsv()
    {
        return Excel::download(new MallShopExport, 'disney.xlsx');
    }


}
