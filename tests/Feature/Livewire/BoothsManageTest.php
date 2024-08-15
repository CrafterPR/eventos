<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\BoothsManage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class BoothsManageTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(BoothsManage::class);

        $component->assertStatus(200);
    }
}
