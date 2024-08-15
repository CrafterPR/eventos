<?php

namespace Database\Seeders;

use App\Models\PaymentService;
use Illuminate\Database\Seeder;

class PaymentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                "summit_id" => 1,
                "name" => "Booth",
                "category" => "booth",
                "code" => 3890098,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "USD",
            ],
            [
                "summit_id" => 1,
                "name" => "Five-days ticket",
                "category" => "ticket",
                "code" => 3890085,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "USD",
            ],
            [
                "summit_id" => 1,
                "name" => "One-day ticket",
                "category" => "ticket",
                "code" => 3890075,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "USD",
            ],
            [
                "summit_id" => 1,
                "name" => "Student ticket",
                "category" => "ticket",
                "code" => 3890075,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "USD",
            ],
            [
                "summit_id" => 1,
                "name" => "Student ticket",
                "category" => "ticket",
                "code" => 3890072,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "KES",
            ],
            [
                "summit_id" => 1,
                "name" => "Booth",
                "category" => "booth",
                "code" => 3890088,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "KES",
            ],
            [
                "summit_id" => 1,
                "name" => "Five-days ticket",
                "category" => "ticket",
                "code" => 3890078,
                "agency" => "Postal Corporation of Kenya",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "KES",
            ],
            [
                "summit_id" => 1,
                "name" => "One-day ticket",
                "category" => "ticket",
                "code" => 3890072,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "KES",
            ],
            [
                "summit_id" => 1,
                "name" => "Summit ticket",
                "category" => "ticket",
                "code" => 3890072,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "KES",
            ],
            [
                "summit_id" => 1,
                "name" => "Summit ticket",
                "category" => "ticket",
                "code" => 3890075,
                "agency" => "Kenya National Innovation Agency",
                "type" => "Merchant",
                "status" => "active",
                "bank_name" => "Kenya Commercial Bank",
                "bank_account_no" => 1236339398,
                "bank_branch" => "Kipande House",
                "currency" => "USD",
            ]
        ];

        foreach ($services as $service) {
            PaymentService::updateOrCreate(['name' => $service['name'], 'currency' => $service['currency']], $service);
        }
    }
}
