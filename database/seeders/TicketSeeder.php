<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $event_id = Event::first()->id;
        $tickets = [
            [
                "event_id" =>$event_id,
                "title" => "One-day ticket",
                "covers" => "<ul>
                    <li>Access to sessions & exhibition for one day</li>
                    <li>Delegate Pack</li>
                    <li>One Meal coupon</li>
                </ul>",
                "days" => 1,
                "persons" => 1,
                "kes_amount" => 7_500,
                "usd_amount" => 50,
                "status" => "active",
            ],
            [
                "event_id" => $event_id,
                "title" => "Five-days ticket",
                "covers" => "<ul>
                    <li>Access to sessions & exhibition for five days</li>
                    <li>Delegate Pack</li>
                    <li>One Meal per coupon per day</li></ul>"
                ,
                "days" => 5,
                "persons" => 1,
                "kes_amount" => 30_000,
                "usd_amount" => 220,
                "status" => "active",
            ],

        ];

        $priority = 0;

        foreach ($tickets as $ticket) {
            $ticket["priority"] = $priority;
            Ticket::updateOrCreate(['title' => $ticket['title']], $ticket);
            $priority = $priority + 1;
        }
    }
}
