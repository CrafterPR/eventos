<?php

namespace Database\Seeders;

use App\Models\Speaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpeakersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data[] = ['modified_by' => 1, 'name' => 'H.E Hon. William Samoei Ruto PhD., C.G.H', 'title' => 'President of the Republic of Kenya and Commander in Chief of the Defense Forces', 'description' => '', 'image_path' => 'KN-230407-017.png', 'data_src' => 'president'];
        $data[] = ['modified_by' => 1, 'name' => 'The Rt Hon Patricia Scotland KC', 'title' => 'Secretary-General of The Commonwealth', 'description' => '', 'image_path' => 'KN-230407-368.png', 'data_src' => 'patricia'];
        $data[] = ['modified_by' => 1, 'name' => 'Hon. Ababu Namwamba, EGH', 'title' => 'Cabinet Secretary, Ministry of Youth Affairs, the Arts and Sports', 'description' => '', 'image_path' => 'KN-230407-002.png', 'data_src' => 'ababu'];
        $data[] = ['modified_by' => 1, 'name' => 'Prof Inderjit Singh Dhaliwal', 'title' => 'Serial Entrepreneur, Former Member of Parliament, Investor and Educator ', 'description' => '', 'image_path' => 'KN-230407-941.png', 'data_src' => 'inderjit'];
        $data[] = ['modified_by' => 1, 'name' => 'Dr. Tonny Omwansa', 'title' => 'CEO, Kenya National Innovation Agency', 'description' => '', 'image_path' => 'tonny_omwansa_QeKJM.png', 'data_src' => 'tonny'];
        $data[] = ['modified_by' => 1, 'name' => 'Prof. Tom Migun Ogada', 'title' => 'Board Chair, Kenya National Innovation Agency', 'description' => '', 'image_path' => 'ken_team_tom_migun_ogada_32x_psgbA.png', 'data_src' => 'migun'];
        $data[] = ['modified_by' => 1, 'name' => 'Daren Tang', 'title' => 'Director General, World Intellectual Property Organisation', 'description' => '', 'image_path' => 'wipo_daren_tang_dg.jpg', 'data_src' => 'daren-tang'];
        $data[] = ['modified_by' => 1, 'name' => 'Sheena Raikundalia', 'title' => 'Country Director, UK- Kenya Tech Hub', 'description' => '', 'image_path' => 'sheena_4DEdd.png', 'data_src' => 'sheena'];
        $data[] = ['modified_by' => 1, 'name' => 'Joshua Setipa', 'title' => 'Senior Director, SPPD', 'description' => '', 'image_path' => 'joshua_setipa_wdGD6.png', 'data_src' => 'joshua'];
        $data[] = ['modified_by' => 1, 'name' => 'Abhik Sen', 'title' => 'Head of Innovation and Partnerships, The Commonwealth Secretariat', 'description' => '', 'image_path' => 'Abhik_Sen-Co.jpg', 'data_src' => 'abhik'];
        $data[] = ['modified_by' => 1, 'name' => 'Dr. Emmy Chirchir', 'title' => 'Science, Tech & Innovation Adviser, UK Foreign, Commonwealth and Development Office', 'description' => '', 'image_path' => 'emmy_chirchir_EG4k8.png', 'data_src' => 'emmy'];
        $data[] = ['modified_by' => 1, 'name' => 'Robert Karanja', 'title' => 'Co-founder, Villgro Africa', 'description' => '', 'image_path' => 'karanja_2htEx.jpeg', 'data_src' => 'karanja'];
        $data[] = ['modified_by' => 1, 'name' => 'Florence Kimata', 'title' => 'Enterprise Development and SME Financing Policy Advisor, Consultant', 'description' => '', 'image_path' => 'florence_kimata_TWNG8.png', 'data_src' => 'florence'];
        $data[] = ['modified_by' => 1, 'name' => 'Eric Nyamwaro', 'title' => 'Partnerships and Linkages Advisor, STEM Impact Center Kenya', 'description' => '', 'image_path' => 'nyamwaro_KLE1t.jpeg', 'data_src' => 'eric'];
        $data[] = ['modified_by' => 1, 'name' => 'Prof. Robert Gateru', 'title' => 'Vice Chancellor, Riara University', 'description' => '', 'image_path' => 'gateru_mshEk.jpeg', 'data_src' => 'robert'];
        $data[] = ['modified_by' => 1, 'name' => 'Professor Washington Yotto Ochieng, EBS, FREng', 'title' => 'Department Head of Civil and Environmental Engineering, Imperial College London', 'description' => '', 'image_path' => 'Ochieng_washington_002.svg', 'data_src' => 'washington'];
        $data[] = ['modified_by' => 1, 'name' => 'Mohamed Ba', 'title' => 'Head of Innovation Division Organisation: International Telecommunication Union', 'description' => '', 'image_path' => 'Mohamed Ba.jpeg', 'data_src' => 'mohamed'];
        $data[] = ['modified_by' => 1, 'name' => 'Phillip Thigo', 'title' => 'Executive Director for Africa, Thunderbird School of Global Management', 'description' => '', 'image_path' => 'phillip-thigo.jpeg', 'data_src' => 'phillip'];

        Speaker::insert($data);
    }
}
