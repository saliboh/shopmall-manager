<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Tests\TestCase;

class MallShopTest extends TestCase
{
    /**
     * @test
     */
    public function indexTestWithSuperAdmin(): void
    {
        $user = User::whereRole(User::ROLES['super-admin'])->get()->first();

        $response = $this->actingAs($user)->get('api/users/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexTestWithShopManager(): void
    {
        $user = User::whereRole(User::ROLES['shop-manager'])->get()->first();

        $response = $this->actingAs($user)->get('api/shops/');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexTestWithStoreOwner(): void
    {
        $user = User::whereRole(User::ROLES['store-owner'])->get()->first();

        $response = $this->actingAs($user)->get('api/shops/');
        $response->assertStatus(200);
    }

}
