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
            ['title' => 'Delegate', 'code' => 'ND', 'created_by' => $created_by],
            ['title' => 'Exhibitor','code' => 'NE', 'created_by' => $created_by],
            ['title' => 'Crew','code' => 'CR', 'created_by' => $created_by],
            ['title' => 'Speaker','code' => 'SP', 'created_by' => $created_by],
            ['title' => 'Moderator','code' => 'MD', 'created_by' => $created_by],
            ['title' => 'Master of ceremony','code' => 'MC', 'created_by' => $created_by],
            ['title' => 'Guest','code' => 'GC', 'created_by' => $created_by],
            ['title' => 'VIP','code' => 'VI', 'created_by' => $created_by],
        ];

        foreach ($data as $cat) {
            Category::updateOrCreate($cat, $cat);
        }
    }
}
