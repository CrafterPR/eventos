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
            'salutation' => 'Mr.',
            'first_name' => 'James',
            'last_name' => 'Makau',
            'username' => 'superadmin',
            'mobile' => '254725830529',
            'id_number' => '23478504',
            'email' => 'james@bremak.co.ke',
            'password' => '4dm1n2024$',
            'email_verified_at' => now(),
        ])->assignRole(Role::SUPER_ADMIN);

    }
}
