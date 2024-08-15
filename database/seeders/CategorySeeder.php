<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['title' => 'High Level', 'created_by' => 1],
            ['title' => 'Mid Level', 'created_by' => 1],
            ['title' => 'Normal Delegate', 'created_by' => 1],
        ];

        foreach ($data as $cat) {
            Category::updateOrCreate($cat, $cat);
        }
    }
}
