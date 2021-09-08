<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::post('/shops/door-sensor', [ShopController::class, 'updateVisits']);
    Route::post('/shops/retrieve-stores', [ShopController::class, 'retrieveStoresForStoreOwner']);
    Route::post('/shops/admin/retrieve-stores', [ShopController::class, 'retrieveAllStoresForAdmin']);

    Route::post('/shops/admin/create', [ShopController::class, 'createShop']);
    Route::post('/shops/admin/update', [ShopController::class, 'update']);
    Route::post('/shops/admin/delete', [ShopController::class, 'update']);
});
