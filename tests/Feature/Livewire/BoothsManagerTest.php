<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\BoothsManager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoothsManagerTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(BoothsManager::class);

        $component->assertStatus(200);
    }
}
