<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =
            [
                'title' => 'KASNEB International Conference for Professionals',
                'theme' => 'Unleashing Potential: Shaping the Future of International Professionals in the Blue Space',
                'venue' => 'Pride Inn Paradise Beach Resort, Convention Center & Spa',
                'organization' => 'KASNEB'];


        Event::create($data);
    }
}
