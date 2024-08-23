<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
                array('id' => Str::orderedUuid(), 'name' => 'BOMET', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'BUNGOMA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'BUSIA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'ELGEYO/MARAKWET', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'EMBU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'GARISSA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'HOMA BAY', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'ISIOLO', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KAJIADO', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KAKAMEGA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KERICHO', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KIAMBU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KILIFI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KIRINYAGA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KISII', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KISUMU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KITUI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'KWALE', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'LAIKIPIA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'LAMU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MACHAKOS', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MAKUENI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MANDERA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MARSABIT', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MERU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MIGORI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MOMBASA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'MURANGA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NAIROBI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NAKURU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NANDI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NAROK', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NYAMIRA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NYANDARUA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'NYERI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'SAMBURU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'SIAYA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'TAITA TAVETA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'TANA RIVER', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'THARAKA - NITHI', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'TRANS NZOIA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'TURKANA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'UASIN GISHU', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'VIHIGA', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'WAJIR', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'WEST POKOT', 'country_id' => $id ),
                array('id' => Str::orderedUuid(), 'name' => 'BARINGO', 'country_id' => $id ))
        );
        //reset foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
