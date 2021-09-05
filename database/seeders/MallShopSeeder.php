<?php

namespace Database\Seeders;

use App\Models\MallShop;
use App\Models\User;
use Illuminate\Database\Seeder;

class MallShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storeOwner = User::factory()->create([
            'role'=> User::ROLES['store-owner']
        ]);

        MallShop::factory(5)->create([
            'user_id' => $storeOwner->id,
        ]);
    }
}
