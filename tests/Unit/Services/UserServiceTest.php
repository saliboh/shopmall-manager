<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Facility $userService
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

        $this->storeOwner= User::factory()->create([
            'role' => User::ROLES['store-owner'],
            'name' => "Original",
        ]);
    }

    /**
     * @test
     */
    public function getAllAndPaginateHasRecord(): void
    {
        $result = $this->userService->getAllExceptUserHavingThisId($this->superAdmin->id);

        $this->assertEquals(2, count($result));
    }

    /**
     * @test
     */
    public function updateUserSuccess(): void
    {
        $form = new Request();
        $form->name = 'Updated';
        $form->email = 'asdasdasd@example.com';
        $form->role = User::ROLES['shop-manager'];
        $form->password = "123123";


        $result = $this->userService->updateUser($this->storeOwner->id, $form);

        $this->assertEquals($form->name, $result->name);
        $this->assertEquals($form->email, $result->email);
        $this->assertEquals($form->role, $result->role);
    }

    /**
     * @test
     */
    public function registerUserSuccess(): void
    {
        $form = new Request();
        $form->name = 'New User';
        $form->email = 'new-user@example.com';
        $form->role = User::ROLES['store-owner'];
        $form->password = "123123";


        $result = $this->userService->updateUser($this->storeOwner->id, $form);

        $newUser = User::find($result->id);
        $this->assertEquals($form->name, $newUser->name);
        $this->assertEquals($form->email, $newUser->email);
        $this->assertEquals($form->role, $newUser->role);
    }
}
