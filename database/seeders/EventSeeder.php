<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programme_id  = 1;

        $data[] = ['programme_id' => $programme_id, 'title' => 'Arrival, Registration, Accreditation', 'schedule_id' => null,'tags' => null,
            'start' => '08:00', 'end' => '09:00', 'description' => '<p>Countries (except Kenya) will get their name tags from their country focal contacts, starting from Friday
            <p>This slot is for those who have not.
            <p>Need designated desks and officers for countries/guests'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Opening Ceremony', 'schedule_id' => null,'tags' => null,
            'start' => '09:00', 'end' => '11:30', 'description' => '<p>Entertainment </p>
            <p>	National Anthem</p>
            <p>	Introduction & Welcome</p>
            <p>	Official Opening: Kenya Head of State</p>
            <p>	Keynote: Secretary General Commonwealth Secretariat</p> 
            <p>	Closing: Cabinet Secretary</p>
            <p>	Next Steps & Official Photo</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Networking Break (+Media Centres)','schedule_id' => null,'tags' => null,
            'start' => '11:30', 'end' => '12:00', 'description' => '<p>Interviews at Media Centres</p>
                <p>Exciting Videos of innovation efforts and outputs from Kenya and the Commonwealth region run on screens</p>
                <p>Sponsor and partner ads run on screen</p>
                <p>Clip of Regional leaders on innovation within Commonwealth</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Opening Plenary',  'schedule_id' => null,'tags' => null,
            'start' => '12:00', 'end' => '13:00', 'description' => '<p>Keynote Address –Daren Tang, DG WIPO</p>
            <p>Panel Discussion: “INNOVATING TO CREATE OUR COMMON WEALTH“</p> 
            <p>Panellists: Commonwealth Secretariat; WIPO; ITC;  AU; UNECA)</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Kenya’s innovation masterplan Launch','schedule_id' => null,'tags' => null,
            'start' => '13:00', 'end' => '13:30', 'description' => '<p>Launch of Kenya’s 10-year innovation masterplan</p><p>Launch of 2023 Kenya Innovation Outlook</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Lunch & Guided Tour', 'schedule_id' => null,'tags' => null,
            'start' => '13:30', 'end' => '15:00', 'description' => '<p>Exhibition guided tour for the VVIP</p>
            <p>Pre-selected exhibition booths (TBD) </p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Commonwealth Innovation Awards',  'schedule_id' => null,'tags' => null,
            'start' => '15:00', 'end' => '17:00', 'description' => '<ul><li>- Commonwealth Secretary General Innovation for Sustainable Development Awards</li>
                <li>- Commonwealth Secretary General Innovation Ambassadors recognition</li></ul>
                <p>Announcing 15 winners.</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Innovators Party – courtesy of the ComSec at venue', 'schedule_id' => null,'tags' => null,
            'start' => '17:00', 'end' => '20:00', 'description' => '<p>Innovators Party – courtesy of the ComSec at venue</p>'];


        $data[] = ['programme_id' => $programme_id, 'title' => 'Presidential Dinner', 'schedule_id' => null,'tags' => null,
            'start' => '18:00', 'end' => '20:00', 'description' => '<p>Presidential Dinner</p>'];

        $programme_id  = 2;

        $data[] = ['programme_id' => $programme_id, 'title' => 'Arrival, Registration, Accreditation + networking', 'schedule_id' => null,'tags' => null,
            'start' => '08:00', 'end' => '09:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Ministerial Innovation Exhibition tour','schedule_id' => null,'tags' => null,
            'start' => '09:00', 'end' => '10:00', 'description' => '<p>Guided tour of relevant ministers</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'ST&I Ministerial Round Table', 'schedule_id' => null,'tags' => null,
                    'start' => '10:00', 'end' => '12:00', 'description' => '<p>An engagement of all invited ST&I ministers</p>
                <p>SG ComSec to officially open</p>
                <p>Minister of Innovation from Canada to give keynote?</p>
                <p>Very successful Innovators from ComSec to share experiences.</p>
                <p>SG to give ComSec perspectives</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Lunch and networking', 'schedule_id' => null,'tags' => null,
            'start' => '12:00', 'end' => '14:00', 'description' => '<p>Ministerial networking lunch (include a brief high-level keynote)</p>
               '];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Plenary - Commonwealth Innovation Ecosystem', 'schedule_id' => null,'tags' => null,
                    'start' => '12:00', 'end' => '14:00', 'description' => '<p>Introduction & stage Setting </p>
                    <p>Commonwealth Ministerial Panel</p> 
                    <p>Resolutions and take-homes (how might lessons shared, model innovation culture across the commonwealth, global innovation citizenship)</p>
                    <p>Vote of Thanks</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Plenary - Policy and Legal Frameworks in innovation across Commonwealth.',
            'schedule_id' => null,'tags' => null,
            'start' => '15:30', 'end' => '16:00', 'description' => '<p>Panel and engagement</p>
               <ul><li>-WIPO</li>
                <li>-Commonwealth (Joshua)</li>
                <li>-CEO: KIPI, KeCOBO</li>
                <li>-Selected Commonwealth country: India? Canada? UK?</li>
                <li>-Partner</li> </ul>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Ministerial Bilateral Meetings', 'schedule_id' => null,'tags' => null,
                    'start' => '16:00', 'end' => '17:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Party and networking – British Council', 'schedule_id' => null,'tags' => null,
                            'start' => '17:30', 'end' => '20:00', 'description' => '<p></p>'];
        // Start of the concurrent schedules

        $data[] = ['programme_id' => $programme_id, 'title' => 'Youth Entrepreneurship Summit', 'schedule_id' => 6, 'tags' => json_encode(['summit']),
                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Open Data Masterclass', 'schedule_id' => 7, 'tags' => json_encode(['summit']),
                                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'gDIH Official Launch', 'schedule_id' => 8, 'tags' => json_encode(['summit']),
                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Youth Entrepreneurship Summit & Students Innovation Summit', 'schedule_id' => 6, 'tags' => json_encode(['summit']),
                                                            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'IP Policy Leadership Roundtable + GII (WIPO) - TBD', 'schedule_id' => 9, 'tags' => json_encode(['summit']),
                                                                    'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'IPR Session for SME’s/Startups', 'schedule_id' => 10, 'tags' => json_encode(['summit']),
                                                                            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];
        $programme_id  = 3;

        $data[] = ['programme_id' => $programme_id, 'title' => 'Innovation in Agriculture and Food Security ', 'schedule_id' => 11, 'tags' => json_encode(['summit']),
                                                                                    'start' => '9:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Digital Transformation', 'schedule_id' => 12, 'tags' => json_encode(['summit']),
                                                                                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Inclusive Innovation', 'schedule_id' => 13, 'tags' => json_encode(['summit']),
                                                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Student Innovations Summit', 'schedule_id' => 14, 'tags' => json_encode(['summit']),
                                                                                                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Talanta Hela Summit – Monetizing Talent', 'schedule_id' => 15, 'tags' => json_encode(['summit']),
                                                                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Industry-Academia Partnerships for Economic Development', 'schedule_id' => 16, 'tags' => json_encode(['summit']),
                                                                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Monetizing Film', 'schedule_id' => 17, 'tags' => json_encode(['summit']),
                                                                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Commonwealth Women Entrepreneurs summit.', 'schedule_id' => 18, 'tags' => json_encode(['summit']),
                                                                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'IP & Copyright Summit', 'schedule_id' => 19, 'tags' => json_encode(['summit']),
                                                                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];


        $data[] = ['programme_id' => $programme_id, 'title' => 'Innovation in Agriculture and Food Security ', 'schedule_id' => 11, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'AI Summit', 'schedule_id' => 12, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Global Innovation Index workshop (TBC)', 'schedule_id' => 13, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Student Innovations Summit', 'schedule_id' => 14, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Talanta Hela Summit – Monetizing Talent', 'schedule_id' => 15, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Student Innovations masterclass', 'schedule_id' => 16, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Monetizing Film', 'schedule_id' => 17, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'YSK Closing Ceremony', 'schedule_id' => 18, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'IP & Copyright Summit', 'schedule_id' => 19, 'tags' => json_encode(['summit']),
            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];


        $programme_id = 4;

        $data[] = ['programme_id' => $programme_id, 'title' => 'Skills & Talent', 'schedule_id' => 20, 'tags' => null,
                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Commercialization Summit', 'schedule_id' => 21, 'tags' => null,
                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Student Led Innovations Summit', 'schedule_id' => 22, 'tags' => null,
                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Presidential Innovation Award pitches', 'schedule_id' => 23, 'tags' => null,
                                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Frugal &Indigenous Innovations', 'schedule_id' => 24, 'tags' => null,
                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Kenya’s Startup Ecosystem', 'schedule_id' => 25, 'tags' => null,
                                                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Climate Action', 'schedule_id' => 26, 'tags' => null,
                                                                    'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'IP & Copyright Summit', 'schedule_id' => 27, 'tags' => null,
                                                                            'start' => '09:00', 'end' => '12:00', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Angel Investment Summit', 'schedule_id' => 28, 'tags' => json_encode(['summit']),
                                                                            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Entrepreneurial Universities Masterclass', 'schedule_id' => 29, 'tags' => json_encode(['summit']),
                                                                                    'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Student Led Innovations Summit', 'schedule_id' => 22, 'tags' => json_encode(['summit']),
                                                                                            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Presidential Innovation Award Pitches', 'schedule_id' => 23, 'tags' => json_encode(['summit']),
                                                                                            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Public Sector Innovation Summit', 'schedule_id' => 25, 'tags' => json_encode(['summit']),
                                                                                                    'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Science Parks and Areas of Innovation', 'schedule_id' => 26, 'tags' => json_encode(['summit']),
                                                                                                            'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'IP & Copyright Summit', 'schedule_id' => 27, 'tags' => json_encode(['summit']),
                                                                                                                    'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];
        $programme_id = 5;

        $data[] = ['programme_id' => $programme_id, 'title' => 'Commonwealth Start-up Pitch Festival Keynote', 'schedule_id' => null, 'tags' => null,
            'start' => '09:00', 'end' => '09:20', 'description' => '<p>Commonwealth Start-up Pitch Festival Keynote</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Panel on attracting private sector investment to startup Economy: GEC to provide (Check email)', 'schedule_id' => null, 'tags' => null,
                    'start' => '09:20', 'end' => '09:50', 'description' => '<p>Panel on attracting private sector investment to startup Economy: GEC to provide (Check email)</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Transition', 'schedule_id' => null, 'tags' => null,
                            'start' => '09:50', 'end' => '10:00', 'description' => '<p>Transition</p>'];


        $data[] = ['programme_id' => $programme_id, 'title' => 'Life Sciences startups', 'schedule_id' => null, 'tags' => null,
                                    'start' => '10:00', 'end' => '12:00', 'description' => '<p>Life Sciences startups
                       Agriculture, food Security and Health (and related)</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Emerging Tech Startups', 'schedule_id' => null, 'tags' => null,
                                            'start' => '10:00', 'end' => '12:00', 'description' => '<p>Fin-Tech/Digital Transformation, Public Sector, Social Development (and related)</p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Green Economy Startups', 'schedule_id' => null, 'tags' => null,
                                                    'start' => '10:00', 'end' => '12:00', 'description' => '<p>Climate Action and Clean Energy, Blue/Green Economy (and related)</p>'];


        $data[] = ['programme_id' => $programme_id, 'title' => 'Lunch', 'schedule_id' => null, 'tags' => null,
                                                            'start' => '13:00', 'end' => '15:00', 'description' => '<p></p>'];


        $data[] = ['programme_id' => $programme_id, 'title' => 'Closing Ceremony, Resolutions & Awards', 'schedule_id' => null, 'tags' => null,
                                                                    'start' => '14:00', 'end' => '16:30', 'description' => '<p></p>'];

        $data[] = ['programme_id' => $programme_id, 'title' => 'Party and networking', 'schedule_id' => null, 'tags' => null,
                                                                            'start' => '16:30', 'end' => '18:00', 'description' => '<p></p>'];



        DB::table('events')->insert($data);
    }
}
