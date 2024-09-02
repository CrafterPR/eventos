<?php

namespace Database\Seeders;

use App\Models\Checkpoint;
use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckpointSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Event::all() as $event) {
            Checkpoint::factory()->create([
                'name' => 'Main Entrance',
                'event_id' => $event->id,
                'is_active' => true,
            ]);
        }
    }
}
