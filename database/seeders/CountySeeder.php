<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        //truncate existing table if any
        DB::table('counties')->truncate();
        $id = Country::whereName('Kenya')->first()?->id;
        DB::table('counties')->insert(
            array(
                array('name' => 'BOMET', 'country_id' => $id ),
                array('name' => 'BUNGOMA', 'country_id' => $id ),
                array('name' => 'BUSIA', 'country_id' => $id ),
                array('name' => 'ELGEYO/MARAKWET', 'country_id' => $id ),
                array('name' => 'EMBU', 'country_id' => $id ),
                array('name' => 'GARISSA', 'country_id' => $id ),
                array('name' => 'HOMA BAY', 'country_id' => $id ),
                array('name' => 'ISIOLO', 'country_id' => $id ),
                array('name' => 'KAJIADO', 'country_id' => $id ),
                array('name' => 'KAKAMEGA', 'country_id' => $id ),
                array('name' => 'KERICHO', 'country_id' => $id ),
                array('name' => 'KIAMBU', 'country_id' => $id ),
                array('name' => 'KILIFI', 'country_id' => $id ),
                array('name' => 'KIRINYAGA', 'country_id' => $id ),
                array('name' => 'KISII', 'country_id' => $id ),
                array('name' => 'KISUMU', 'country_id' => $id ),
                array('name' => 'KITUI', 'country_id' => $id ),
                array('name' => 'KWALE', 'country_id' => $id ),
                array('name' => 'LAIKIPIA', 'country_id' => $id ),
                array('name' => 'LAMU', 'country_id' => $id ),
                array('name' => 'MACHAKOS', 'country_id' => $id ),
                array('name' => 'MAKUENI', 'country_id' => $id ),
                array('name' => 'MANDERA', 'country_id' => $id ),
                array('name' => 'MARSABIT', 'country_id' => $id ),
                array('name' => 'MERU', 'country_id' => $id ),
                array('name' => 'MIGORI', 'country_id' => $id ),
                array('name' => 'MOMBASA', 'country_id' => $id ),
                array('name' => 'MURANGA', 'country_id' => $id ),
                array('name' => 'NAIROBI', 'country_id' => $id ),
                array('name' => 'NAKURU', 'country_id' => $id ),
                array('name' => 'NANDI', 'country_id' => $id ),
                array('name' => 'NAROK', 'country_id' => $id ),
                array('name' => 'NYAMIRA', 'country_id' => $id ),
                array('name' => 'NYANDARUA', 'country_id' => $id ),
                array('name' => 'NYERI', 'country_id' => $id ),
                array('name' => 'SAMBURU', 'country_id' => $id ),
                array('name' => 'SIAYA', 'country_id' => $id ),
                array('name' => 'TAITA TAVETA', 'country_id' => $id ),
                array('name' => 'TANA RIVER', 'country_id' => $id ),
                array('name' => 'THARAKA - NITHI', 'country_id' => $id ),
                array('name' => 'TRANS NZOIA', 'country_id' => $id ),
                array('name' => 'TURKANA', 'country_id' => $id ),
                array('name' => 'UASIN GISHU', 'country_id' => $id ),
                array('name' => 'VIHIGA', 'country_id' => $id ),
                array('name' => 'WAJIR', 'country_id' => $id ),
                array('name' => 'WEST POKOT', 'country_id' => $id ),
                array('name' => 'BARINGO', 'country_id' => $id ))
        );
        //reset foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
