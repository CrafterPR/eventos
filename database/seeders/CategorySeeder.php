<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $created_by = User::first()->id;
        $data = [
            ['title' => 'National delegate', 'code' => 'ND', 'created_by' => $created_by],
            ['title' => 'National exhibitor','code' => 'NE', 'created_by' => $created_by],
            ['title' => 'International delegate','code' => 'ID', 'created_by' => $created_by],
            ['title' => 'International exhibitor','code' => 'IE', 'created_by' => $created_by],
        ];

        foreach ($data as $cat) {
            Category::updateOrCreate($cat, $cat);
        }
    }
}
