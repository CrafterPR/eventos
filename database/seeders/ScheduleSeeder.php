<?php

namespace Database\Seeders;

use App\Models\Programme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $id = Programme::whereTitle('Day Two')->firstOrFail()->id;
        $data[] = ['title' => 'Youth Entrepreneurship Summit', 'programme_id' => $id];
        $data[] = ['title' => 'Open Data Masterclass', 'programme_id' => $id];
        $data[] = ['title' => 'gDIH Official Launch', 'programme_id' => $id];
        $data[] = ['title' => 'IP Policy Leadership Round table + GII (WIPO) - TBD', 'programme_id' => $id];
        $data[] = ['title' => 'IPR Session for SME’s/Startups', 'programme_id' => $id];

        $id = Programme::whereTitle('Day Three')->firstorFail()->id;
        $data[] = ['title' => 'Innovation in Agriculture and Food Security', 'programme_id' => $id];
        $data[] = ['title' => 'Digital Transformation', 'programme_id' => $id];
        $data[] = ['title' => 'Inclusive Innovation', 'programme_id' => $id];
        $data[] = ['title' => 'Student Innovations Summit', 'programme_id' => $id];
        $data[] = ['title' => 'Talanta Hela Summit – Monetizing Talent', 'programme_id' => $id];
        $data[] = ['title' => 'Industry-Academia Partnerships for Economic Development', 'programme_id' => $id];
        $data[] = ['title' => 'Monetizing Film', 'programme_id' => $id];
        $data[] = ['title' => 'Commonwealth Women Entrepreneurs summit.', 'programme_id' => $id];
        $data[] = ['title' => 'IP & Copyright Summit', 'programme_id' => $id];


        $id = Programme::whereTitle('Day Four')->firstOrFail()->id;
        $data[] =  ['title' => 'Skills & Talent', 'programme_id' => $id];
        $data[] = ['title' => 'Commercialization Summit', 'programme_id' => $id];
        $data[] =  ['title' => 'Student Led Innovations Summit', 'programme_id' => $id];
        $data[] =  ['title' => 'Presidential Innovation Award pitches', 'programme_id' => $id];
        $data[] =  ['title' => 'Frugal &Indigenous Innovations', 'programme_id' => $id];
        $data[] =  ['title' => 'Kenya’s Startup Ecosystem', 'programme_id' => $id];
        $data[] =  ['title' => 'Climate Action', 'programme_id' => $id];
        $data[] =  ['title' => 'IP & Copyright Summit', 'programme_id' => $id];
        $data[] =  ['title' => 'Angel Investment Summit', 'programme_id' => $id];
        $data[] =  ['title' => 'Entrepreneurial Universities Masterclass', 'programme_id' => $id];
        $data[] =  ['title' => 'Student Led Innovations Summit', 'programme_id' => $id];

        // $id = Programme::whereTitle('Fifth Day')->firstOrFail()->id;
        // $data[] = ['title' => 'Life Sciences startups', 'programme_id' => $id];
        // $data[] =['title' => 'Emerging Tech Startups', 'programme_id' => $id];
        // $data[] = ['title' => 'Green Economy Startups', 'programme_id' => $id];

        DB::table('schedules')->insert($data);
    }
}
