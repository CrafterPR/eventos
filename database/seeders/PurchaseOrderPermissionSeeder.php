<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PurchaseOrderPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'view-purchase', 'display_name' => 'View Purchase Order', 'guard_name' => 'web'],
            ['name' => 'send-purchase-reminder', 'display_name' => 'Send Purchase Reminder', 'guard_name' => 'web'],
            ['name' => 'mark-purchase-paid', 'display_name' => 'Mark Purchase Paid', 'guard_name' => 'web'],
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(
                ['name' => $perm['name'], 'guard_name' => $perm['guard_name']],
                ['display_name' => $perm['display_name']]
            );
        }

        // Assign to administrator role
        $adminRole = Role::where('name', 'administrator')->first();
        if ($adminRole) {
            $adminRole->givePermissionTo(['view-purchase', 'send-purchase-reminder', 'mark-purchase-paid']);
        }
    }
}
