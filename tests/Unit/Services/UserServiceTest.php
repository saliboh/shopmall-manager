<?php

namespace Tests\Unit\Services;

use App\Models\MallShop;
use App\Models\Shop;
use App\Models\User;
use App\Services\ShopService;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var UserService $userService
     */
    private $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->userService = $this->app->make(UserService::class);

        $this->superAdmin = User::factory()->create([
            'role' => User::ROLES['super-admin'],
        ]);

        $this->shopManager = User::factory()->create([
            'role' => User::ROLES['shop-manager'],
        ]);

        $this->storeOwnerA = User::factory()->create([
            'role'=> User::ROLES['store-owner'],
            'password' => bcrypt('123123'),
        ]);

        $this->storeOwnerB = User::factory()->create([
            'role'=> User::ROLES['store-owner'],
            'password' => bcrypt('123123'),
        ]);

        $this->mallShopStoreA = Shop::factory()->create([
            'user_id' => $this->storeOwnerA->id,
            'visit' => 0,
            'floor' => 1,
        ]);

        $this->mallShopStoreB = Shop::factory()->create([
            'user_id' => $this->storeOwnerB->id,
            'visit' => 50,
            'floor' => 1,
        ]);
    }

    /**
     * @test
     */
    public function deleteSuccess(): void
    {
        $request = [
            'id' => $this->storeOwnerB->id
        ];

        $result = $this->userService->delete($request);
        $this->assertTrue($result['delete-status']);
    }

    /**
     * @test
     */
    public function updateSuccess(): void
    {
        $request = [
            'id' => $this->storeOwnerA->id,
            'role' => User::ROLES['shop-manager'],
            'name' => 'New Name',
            'email' => 'newemail@yahoo.com',
            'password' => '123123',

        ];

        $result = $this->userService->update($request);
        $this->assertTrue($result['update-status']);
    }


}
