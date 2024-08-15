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
            AffiliationsSeeder::class,
            CountrySeeder::class,
            CountySeeder::class,
            SummitSeeder::class,
            BoothSeeder::class,
            ProgrammeSeeder::class,
            ScheduleSeeder::class,
            EventSeeder::class,
            PaymentServiceSeeder::class,
            TicketSeeder::class,
            SpeakersSeeder::class,
            EmailsSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
