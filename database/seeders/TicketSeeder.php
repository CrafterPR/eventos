<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tickets = [
            [
                "summit_id" => 1,
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
                "summit_id" => 1,
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
            [
            "summit_id" => 1,
            "title" => "Summit ticket",
            "covers" => "<ul>
                <li>This ticket is valid for one adult only. It can be redeemed at a day of your choice. </li>
                <li>With this ticket, you will get access to summit proceedings and exhibitions only</li>
                <li>Meals and refreshments are not included in the package</li></ul>"
            ,
            "days" => 1,
            "persons" => 1,
            "kes_amount" => 1_000,
            "usd_amount" => 10,
            "status" => "active",
        ],
            [
                "summit_id" => 1,
                "title" => "Student ticket",
                "covers" => "<ul>
                    <li>This ticket is valid for one student only. It can be redeemed at a day of your choice. </li>
                    <li>With this ticket, you will get access to summit proceedings,</li>
                    <li>Exhibitions and one student-lunch coupon</li>
                </ul>",
                "days" => 1,
                "persons" => 1,
                "kes_amount" => 1_000,
                "usd_amount" => 10,
                "status" => "active",
            ]
        ];

        $priority = 0;

        foreach ($tickets as $ticket) {
            $ticket["priority"] = $priority;
            Ticket::updateOrCreate(['title' => $ticket['title']], $ticket);
            $priority = $priority + 1;
        }
    }
}
