<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\MallShopController;

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

Route::post('login', [UserController::class, 'login']);
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

Route::group(['prefix' => 'users', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [UserController::class, 'index'])->middleware(['userRole:super-admin']);
    Route::post('add', [UserController::class, 'register'])->middleware(['userRole:super-admin']);
    Route::get('edit/{id}', [UserController::class, 'edit'])->middleware(['userRole:super-admin']);
    Route::post('update/{id}', [UserController::class, 'update'])->middleware(['userRole:super-admin']);
    Route::delete('delete/{id}', [UserController::class, 'delete'])->middleware(['userRole:super-admin']);
});

Route::group(['prefix' => 'shops', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [MallShopController::class, 'index']);
});

//For Door Sensor, Shop Visit Count
Route::post('door-sensor', [MallShopController::class, 'visit']);
