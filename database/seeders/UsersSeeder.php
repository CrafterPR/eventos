<?php

namespace Database\Seeders;

use App\Enum\UserType;
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
            'mobile' => '254790776752',
            'id_number' => '790776752',
            'email' => 'kiw@innovationagency.go.ke',
            'password' => '!!SaKiw2023@',
            'institution' => 'Kenia',
            'disability' => 'no',
            'position' => 'Technical',
            'email_verified_at' => now(),
        ])->assignRole('administrator');

        User::create([
            'salutation' => 'Mr',
            'first_name' => 'James',
            'last_name' => 'Makau',
            'mobile' => '+254725830529',
            'email' => 'jacjimus@gmail.com',
            'password' => 'JMakau@123',
            'institution' => 'Kenia',
            'disability' => 'no',
            'position' => 'Technical',
            'email_verified_at' => now(),
        ])->assignRole('administrator');

        // #exhibitor
        // User::factory()->create([
        //     'email' => 'exhibitor@gmail.com',
        //     'user_type' => UserType::EXHIBITOR,
        //     'password' => "password"
        // ]);
        //
        // #delegate
        // User::factory()->create([
        //     'email' => 'delegate@gmail.com',
        //     'user_type' => UserType::DELEGATE,
        //     'password' => "password"
        // ]);
        //
        // #others
        // User::factory(50)->create();
    }
}
