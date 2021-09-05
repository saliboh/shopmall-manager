<?php

namespace Tests\Unit\Api;

use App\Models\MallShop;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class MallShopTest extends TestCase
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

        $this->storeOwner= User::factory()->create([
            'role' => User::ROLES['store-owner'],
        ]);

        $this->mallShopStore = MallShop::factory()->create([
            'user_id' =>  $this->storeOwner->id,
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
        $response = $this->actingAs($this->shopManager)->get('api/shops/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexTestWithStoreOwner(): void
    {
        $response = $this->actingAs($this->storeOwner)->get('api/shops/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexTestWithoutRole(): void
    {
        $response = $this->get('api/shops/');
        $response->assertStatus(500);
    }

    /**
     * @test
     */
    public function visitSuccess(): void
    {
        Session::start();
        $requestForm = [
            '_token' => csrf_token(),
            'shopmall_id' =>  $this->mallShopStore->id,
        ];

        $response = $this->call('POST', 'api/door-sensor', $requestForm);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function visitFail(): void
    {
        Session::start();
        $requestForm = [
            '_token' => csrf_token(),
            'shopmall_id' => 'incorrect',
        ];

        $response = $this->call('POST', 'api/door-sensor', $requestForm);
        $response->assertStatus(302);
    }

}
