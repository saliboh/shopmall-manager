<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

    Route::post('/shops/admin/create', [ShopController::class, 'create']);
    Route::patch('/shops/admin/update', [ShopController::class, 'update']);
    Route::delete('/shops/admin/destroy', [ShopController::class, 'destroy']);

    Route::get('/admin/users/index', [UserController::class, 'index']);
    Route::post('/admin/users/create', [AuthController::class, 'register']);
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit']);
    Route::delete('/admin/users/destroy', [UserController::class, 'destroy']);
    Route::patch('/admin/users/update', [UserController::class, 'update']);
    Route::get('/admin/users/requester-role', [UserController::class, 'requesterRole']);
});
