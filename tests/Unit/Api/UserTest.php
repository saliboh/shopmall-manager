<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $superAdmin;
    private $storeOwner;
    private $shopManager;

    public function setUp(): void
    {
        parent::setUp();

        $this->superAdmin = User::factory()->create([
            'role' => User::ROLES['super-admin'],
        ]);

        $this->shopManager = User::factory()->create([
            'role' => User::ROLES['shop-manager'],
        ]);

        $this->storeOwner= User::factory()->create([
            'role' => User::ROLES['store-owner'],
        ]);
    }

    /**
     * @test
     */
    public function indexTestWithSuperAdmin(): void
    {
        $response = $this->actingAs($this->superAdmin)->get('api/users/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexTestWithShopManager(): void
    {
        $response = $this->actingAs($this->shopManager)->get('api/users/');
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function indexTestWithStoreOwner(): void
    {
        $response = $this->actingAs($this->storeOwner)->get('api/users/');
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function updateTestWithSuperAdmin(): void
    {
        $response = $this->actingAs($this->superAdmin)->post('api/users/update/'.$this->superAdmin->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function updateTestWithShopManager(): void
    {
        $response = $this->actingAs($this->shopManager)->post('api/users/update/'.$this->shopManager->id);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function updateTestWithStoreOwner(): void
    {
        $response = $this->actingAs($this->storeOwner)->post('api/users/update/'.$this->storeOwner->id);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function editTestWithSuperAdmin(): void
    {
        $response = $this->actingAs($this->superAdmin)->get('api/users/edit/'.$this->storeOwner->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function editTestWithShopManager(): void
    {
        $response = $this->actingAs($this->shopManager)->get('api/users/edit/'.$this->storeOwner->id);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function editTestWithStoreOwner(): void
    {
        $response = $this->actingAs($this->storeOwner)->get('api/users/edit/'.$this->storeOwner->id);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function deleteTestWithSuperAdmin(): void
    {
        $response = $this->actingAs($this->superAdmin)->get('api/users/delete/'.$this->shopManager->id);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function deleteTestWithShopManager(): void
    {
        $response = $this->actingAs($this->shopManager)->delete('api/users/delete/'.$this->storeOwner->id);
        $response->assertStatus(401);
    }

    /**
     * @test
     */
    public function deleteTestWithStoreOwner(): void
    {
        $response = $this->actingAs($this->storeOwner)->delete('api/users/delete/'.$this->storeOwner->id);
        $response->assertStatus(401);
    }

}
