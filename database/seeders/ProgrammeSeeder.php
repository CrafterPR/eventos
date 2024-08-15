<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgrammeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'Day One', 'date' => Carbon::parse("27-11-2023")],
            ['title' => 'Day Two', 'date' => Carbon::parse("28-11-2023")],
            ['title' => 'Day Three', 'date' => Carbon::parse("29-11-2023")],
            ['title' => 'Day Four', 'date' => Carbon::parse("30-11-2023")],
            ['title' => 'Day Five', 'date' => Carbon::parse("01-12-2023")]
        ];

        DB::table('programmes')->insert($data);
    }
}
