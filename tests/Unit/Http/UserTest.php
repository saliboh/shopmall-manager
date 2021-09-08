<?php

namespace Tests\Unit\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class UserTest extends TestCase
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
    }

    /**
     * @test
     */
    public function loginSuccess(): void
    {
        Session::start();

        $response = $this->call('POST', 'api/login');
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    public function loginout(): void
    {
        Session::start();

        $response = $this->actingAs($this->superAdmin)->call('POST', 'api/logout');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function registerSuccess(): void
    {
        Session::start();
        $requestForm = [
            '_token' => csrf_token(),
            'name' => "nuew user",
            'email' =>  'newEmail@example.com',
            'password' => '123123',
            'role' => User::ROLES['shop-manager']
        ];

        $response = $this->actingAs($this->superAdmin)->call('POST', 'api/register', $requestForm);
        $response->assertStatus(201);
    }

    /**
     * @test
     */
    public function registerFail(): void
    {
        Session::start();
        $requestForm = [
            '_token' => csrf_token(),
            'name' => "nuew user",
            'email' =>  'newEmail@example.com',
            'password' => '123123',
            'role' => User::ROLES['shop-manager']
        ];

        $response = $this->actingAs($this->shopManager)->call('POST', 'api/register', $requestForm);
        $response->assertStatus(401);
    }
}
