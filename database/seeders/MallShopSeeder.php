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
        $storeOwnerA = User::factory()->create([
            'role'=> User::ROLES['store-owner'],
            'password' => bcrypt('123123'),
        ]);

        $storeOwnerB = User::factory()->create([
            'role'=> User::ROLES['store-owner'],
            'password' => bcrypt('123123'),
        ]);

        MallShop::factory(3)->create([
            'user_id' => $storeOwnerA->id,
        ]);

        MallShop::factory(3)->create([
            'user_id' => $storeOwnerB->id,
        ]);
    }
}
