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
            'salutation' => 'Ms',
            'first_name' => 'Super',
            'last_name' => 'admin',
            'mobile' => '254722410268',
            'id_number' => '790776752',
            'email' => 'jacjimus@gmail.com',
            'password' => 'Password@234!!',
            'institution' => 'CraftedPR',
            'disability' => 'no',
            'position' => 'Technical',
            'email_verified_at' => now(),
        ])->assignRole(Role::SUPER_ADMIN);

        User::create([
            'salutation' => 'Mr',
            'first_name' => 'CraftedPR',
            'last_name' => 'Admin',
            'mobile' => '+254725830529',
            'email' => 'admin@craftedpr.co.ke',
            'password' => 'Crafted@234!!',
            'institution' => 'CraftedPR',
            'disability' => 'no',
            'position' => 'Technical',
            'email_verified_at' => now(),
        ])->assignRole('administrator');


    }
}
