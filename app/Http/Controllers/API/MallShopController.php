<?php

namespace App\Http\Controllers\API;

use App\Models\MallShop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MallShopVisitRequest;
use App\Models\User;
use App\Services\MallShopService;
use Exception;
use Illuminate\Support\Facades\Auth;

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

    public function visit(MallShopVisitRequest $request)
    {
        try {
            $result = $this->mallShopService->addStoreVisitCount($request->validated());
            $success = true;
            $message = "Vist Count updated For Shop Name: ". $result->name ." with ID#:".$result->id;
        }
        catch (\Exception $e) {
            $success = false;
            $message = "Something went wrong: ".$e->getMessage();
        }


        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

}
