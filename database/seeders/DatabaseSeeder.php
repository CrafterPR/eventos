<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            RolesPermissionsSeeder::class,
            UsersSeeder::class,
            CountrySeeder::class,
            CountySeeder::class,
            EventSeeder::class,
            CategorySeeder::class,
            DelegatesSeeder::class
        ]);
    }
}
