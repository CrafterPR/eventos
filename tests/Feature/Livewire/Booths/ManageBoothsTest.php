<?php

namespace Tests\Feature\Livewire\Booths;

use App\Http\Livewire\Booths\ManageBooths;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ManageBoothsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ManageBooths::class);

        $component->assertStatus(200);
    }
}
