<?php

namespace Database\Seeders;

use App\Models\EmailGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmailGroupsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
           ['name' => 'All Registered'],
           ['name' => 'All Delegates'],
           ['name' => 'All Exhibitors'],
           ['name' => 'Paid Delegates'],
           ['name' => 'Unpaid Delegates'],
           ['name' => 'Paid Exhibitors'],
           ['name' => 'Unpaid Exhibitors'],
           ['name' => 'Staff'],
        ];

        foreach($data as $dat) {
             EmailGroup::updateOrCreate($dat, $dat);
        }

    }
}
