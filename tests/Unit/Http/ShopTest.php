<?php

namespace Tests\Unit\Api;

use App\Models\Shop;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class ShopTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->superAdmin = User::factory()->create([
            'role' => User::ROLES['super-admin'],
        ]);

        $this->shopManager = User::factory()->create([
            'role' => User::ROLES['shop-manager'],
        ]);

        $this->storeOwnerA= User::factory()->create([
            'role' => User::ROLES['store-owner'],
        ]);

        $this->mallShopStoreA = Shop::factory()->create([
            'user_id' =>  $this->storeOwnerA->id,
        ]);

        $this->storeOwnerB= User::factory()->create([
            'role' => User::ROLES['store-owner'],
        ]);

        $this->mallShopStoreB = Shop::factory()->create([
            'user_id' =>  $this->storeOwnerB->id,
        ]);
    }

    /**
     * @test
     */
    public function updateVisitsSuccess(): void
    {
        Session::start();
        $requestForm = [
            '_token' => csrf_token(),
            'id' =>  $this->mallShopStoreA->id,
            'visit' => 1,
        ];

        $response = $this->actingAs($this->storeOwnerA)->call('POST', 'api/shops/door-sensor', $requestForm);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function updateVisitsFail(): void
    {
        Session::start();
        $requestForm = [
            '_token' => csrf_token(),
            'id' =>  $this->mallShopStoreB->id,
            'visit' => 1,
        ];

        $response = $this->actingAs($this->storeOwnerA)->call('POST', 'api/shops/door-sensor', $requestForm);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function retrieveStoresForStoreOwnerSuccess(): void
    {
        Session::start();

        Shop::factory(3)->create([
            'user_id' =>  $this->storeOwnerB->id,
        ]);

        $requestForm = [
            '_token' => csrf_token(),
            'floor' => null,
        ];

        $response = $this->actingAs($this->storeOwnerB)->call('POST', 'api/shops/retrieve-stores', $requestForm);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function retrieveAllStoresForAdminSuccess(): void
    {
        Session::start();

        $requestForm = [
            '_token' => csrf_token(),
            'floor' => null,
        ];

        $response = $this->actingAs($this->shopManager)->call('POST', 'api/shops/admin/retrieve-stores', $requestForm);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function retrieveAllStoresForAdminFail(): void
    {
        Session::start();

        $requestForm = [
            '_token' => csrf_token(),
            'floor' => null,
        ];

        $response = $this->actingAs($this->storeOwnerA)->call('POST', 'api/shops/admin/retrieve-stores', $requestForm);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function createSuccess(): void
    {
        Session::start();

        $requestForm = [
            '_token' => csrf_token(),
            'user_id' => $this->storeOwnerB->id,
            'name' => 'NEW',
            'floor' => 2
        ];

        $response = $this->actingAs($this->shopManager)->call('POST', 'api/shops/admin/create', $requestForm);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function createFail(): void
    {
        Session::start();

        $requestForm = [
            '_token' => csrf_token(),
            'user_id' => $this->storeOwnerB->id,
            'name' => 'NEW',
            'floor' => 2
        ];

        $response = $this->actingAs($this->storeOwnerA)->call('POST', 'api/shops/admin/create', $requestForm);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function deleteSuccess(): void
    {
        Session::start();

        $shopToBeDelted = Shop::factory()->create([
            'user_id' => $this->storeOwnerB->id,
            'visit' => 50,
            'floor' => 2,
        ]);

        $requestForm = [
            '_token' => csrf_token(),
            'id' => $shopToBeDelted->id,
        ];

        $response = $this->actingAs($this->shopManager)->call('DELETE', 'api/shops/admin/delete', $requestForm);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function deleteFail(): void
    {
        Session::start();

        $shopToBeDelted = Shop::factory()->create([
            'user_id' => $this->storeOwnerB->id,
            'visit' => 50,
            'floor' => 2,
        ]);

        $requestForm = [
            '_token' => csrf_token(),
            'id' => $shopToBeDelted->id,
        ];

        $response = $this->actingAs($this->storeOwnerA)->call('DELETE', 'api/shops/admin/delete', $requestForm);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function updateSuccess(): void
    {
        Session::start();

        $requestForm = [
            '_token' => csrf_token(),
            'id' => $this->mallShopStoreB->id,
            'name' => 'New Name',
            'floor' => 100,
            'visit' => 1,
            'user_id' => $this->mallShopStoreB->user_id,
        ];

        $response = $this->actingAs($this->shopManager)->call('PATCH', 'api/shops/admin/update', $requestForm);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function updateFail(): void
    {
        Session::start();

        $requestForm = [
            '_token' => csrf_token(),
            'id' => $this->mallShopStoreB->id,
            'name' => 'New Name',
            'floor' => 100,
            'visit' => 1,
            'user_id' => $this->mallShopStoreB->user_id,
        ];

        $response = $this->actingAs($this->storeOwnerA)->call('PATCH', 'api/shops/admin/update', $requestForm);
        $response->assertStatus(401);
    }
}
