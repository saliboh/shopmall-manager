<?php

namespace Tests\Unit\Services;

use App\Models\MallShop;
use App\Models\Shop;
use App\Models\User;
use App\Services\ShopService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShopServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ShopService $shopService
     */
    private $shopService;

    public function setUp(): void
    {
        parent::setUp();

        $this->shopService = $this->app->make(ShopService::class);

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
    public function updateShopVisitorCountSuccess(): void
    {
        $form = [
            'id' => $this->mallShopStoreA->id,
            'visit' => 22
        ];

        $result = $this->actingAs($this->storeOwnerA)->shopService->updateShopVisitorCount($form);
        $this->assertEquals($result['shop-after-update'], $this->mallShopStoreA->visit + $form['visit']);

        $form = [
            'id' => $this->mallShopStoreB->id,
            'visit' => 22
        ];

        $result = $this->actingAs($this->storeOwnerB)->shopService->updateShopVisitorCount($form);
        $this->assertEquals($result['shop-after-update'], $this->mallShopStoreB->visit + $form['visit']);
    }

    /**
     * @test
     */
    public function retrieveShopsByStoreOwnerHasRecord(): void
    {
        $form = ['floor' => 1];

        $result = $this->actingAs($this->storeOwnerB)->shopService->retrieveShopsByStoreOwner($this->storeOwnerB->id, $form);
        $this->assertEquals(1, $result['total-stores']);

        $result = $this->actingAs($this->storeOwnerA)->shopService->retrieveShopsByStoreOwner($this->storeOwnerA->id, $form);
        $this->assertEquals(1, $result['total-stores']);
    }

    /**
     * @test
     */
    public function retrieveShopsByStoreOwnerHasNoRecord(): void
    {
        $form = ['floor' => 0];

        $result = $this->actingAs($this->storeOwnerB)->shopService->retrieveShopsByStoreOwner($this->storeOwnerA->id, $form);
        $this->assertEquals(0, $result['total-stores']);

        $result = $this->actingAs($this->storeOwnerA)->shopService->retrieveShopsByStoreOwner($this->storeOwnerB->id, $form);
        $this->assertEquals(0, $result['total-stores']);
    }

    /**
     * @test
     */
    public function retrieveAllStoresHasRecord(): void
    {
        Shop::factory()->create([
            'user_id' => $this->storeOwnerB->id,
            'visit' => 50,
            'floor' => 2,
        ]);

        $form = [];

        $result = $this->actingAs($this->shopManager)->shopService->retrieveAllStores($this->storeOwnerB->id, $form);
        $this->assertEquals(3, $result['total-stores']);
    }

    /**
     * @test
     */
    public function createSuccess(): void
    {
        $form = [
            'user_id' => $this->storeOwnerB->id,
            'name' => 'NEW',
            'floor' => 2
        ];

        $this->actingAs($this->shopManager)->shopService->create($form);

        $this->assertEquals($form['name'], Shop::whereName('NEW')->get()->first()->name);
    }
}
