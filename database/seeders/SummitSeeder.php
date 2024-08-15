<?php

namespace Database\Seeders;

use App\Enum\SummitStatus;
use App\Models\Summit;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SummitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $title = "KENYA INNOVATION WEEK 2023";

        Summit::create([
            "title" => $title,
            "slug" => Str::slug($title),
            "edition_title" => "COMMONWEALTH EDITION",
            "edition_description" => "COMMONWEALTH EDITION",
            "theme" => "INNOVATING TO UNLOCK OUR COMMON WEALTH",
            "start_date" => Carbon::parse("27-08-2023"),
            "end_date" => Carbon::parse("1-12-2023"),
            "venue" => "Nairobi",
            "status" => SummitStatus::ACTIVE
        ]);
    }
}
