<?php

namespace Database\Seeders;

use App\Models\Delegate;
use Illuminate\Database\Seeder;

class DelegatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Delegate::factory()->count(50)->create();
    }
}
