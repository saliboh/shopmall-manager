<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create default super admin
        User::factory(1)->create([
            'name' => "Super Admin",
            'email' => "superadmin@example.com",
            'password' => bcrypt('123123'),
            'role'=> User::ROLES['super-admin'],
        ]);

        User::factory()->create([
            'name' => "Shop Manager",
            'email' => "shop-manager@example.com",
            'password' => bcrypt('123123'),
            'role'=> User::ROLES['shop-manager'],
        ]);

        User::factory()->create([
            'name' => "Store Owner",
            'email' => "store-owner@example.com",
            'password' => bcrypt('123123'),
            'role'=> User::ROLES['store-owner'],
        ]);
    }
}
