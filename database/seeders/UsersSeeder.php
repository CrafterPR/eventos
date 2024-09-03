<?php

namespace Database\Seeders;

use App\Enum\UserType;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Vendor',
            'last_name' => 'Account',
            'mobile' => '254722410268',
             'email' => 'jacjimus@gmail.com',
            'password' => 'Password@234!!',
            'email_verified_at' => now(),
        ])->assignRole(Role::SUPER_ADMIN);

        User::create([
            'first_name' => 'CraftedPR',
            'last_name' => 'Admin',
            'mobile' => '+254725830529',
            'email' => 'admin@craftedpr.co.ke',
            'password' => 'Crafted@234!!',
            'email_verified_at' => now(),
        ])->assignRole(Role::ADMINISTRATOR);


    }
}
