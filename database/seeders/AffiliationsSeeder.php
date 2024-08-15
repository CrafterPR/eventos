<?php

namespace Database\Seeders;

use App\Models\Affiliation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AffiliationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $affiliations = [
            ['name' => 'Startup', 'created_at' => now()],
            ['name' => 'Private Sector', 'created_at' => now()],
            ['name' => 'University', 'created_at' => now()],
            ['name' => 'TVET', 'created_at' => now()],
            ['name' => 'Development Partner', 'created_at' => now()],
            ['name' => 'Venture Capital', 'created_at' => now()],
            ['name' => 'Investor', 'created_at' => now()],
            ['name' => 'Ministry', 'created_at' => now()],
            ['name' => 'SAGA', 'created_at' => now()],
            ['name' => 'NGO', 'created_at' => now()],
            ['name' => 'Other', 'created_at' => now()],
        ];
        Affiliation::insert($affiliations);
    }
}
