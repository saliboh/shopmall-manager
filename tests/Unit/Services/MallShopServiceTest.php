<?php

namespace Tests\Unit\Services;

use App\Http\Requests\MallShopVisitRequest;
use App\Models\MallShop;
use App\Models\User;
use App\Services\MallShopService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MallShopServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Facility $userService
     */
    private $userService;

    public function setUp(): void
    {
        parent::setUp();

        $this->mallShopService = $this->app->make(MallShopService::class);

        $storeOwnerA = User::factory()->create([
            'role'=> User::ROLES['store-owner'],
            'password' => bcrypt('123123'),
        ]);

        $storeOwnerB = User::factory()->create([
            'role'=> User::ROLES['store-owner'],
            'password' => bcrypt('123123'),
        ]);

        $this->mallShopStoreA = MallShop::factory()->create([
            'user_id' => $storeOwnerA->id,
            'store_visits' => 0,
        ]);

        $this->mallShopStoreB = MallShop::factory()->create([
            'user_id' => $storeOwnerB->id,
            'store_visits' => 50,
        ]);


    }

    /**
     * @test
     */
    public function addStoreVisitCountSuccess(): void
    {
        $form = [
            'shopmall_id' => $this->mallShopStoreA->id,
        ];

        for($visit = 1, $maxVisit = 3; $visit <= $maxVisit; $visit++) {
            $result = $this->mallShopService->addStoreVisitCount($form);
            $this->assertEquals($visit, $result->store_visits);
        }

        $form = [
            'shopmall_id' => $this->mallShopStoreB->id,
        ];

        for($visit = 1, $maxVisit = 3; $visit <= $maxVisit; $visit++) {
            $result = $this->mallShopService->addStoreVisitCount($form);
            $this->assertEquals($this->mallShopStoreB->store_visits + $visit, $result->store_visits);
        }

    }
}
