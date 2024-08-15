<?php

namespace Tests\Feature\Livewire\Tickets;

use App\Http\Livewire\Tickets\ApproveTicketModal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ManageTicketsTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(ApproveTicketModal::class);

        $component->assertStatus(200);
    }
}
