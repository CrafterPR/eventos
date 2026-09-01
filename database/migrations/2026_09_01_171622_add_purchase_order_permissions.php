<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create new purchase order permissions
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Permission::whereIn('name', [
            'view-purchase',
            'send-purchase-reminder',
            'mark-purchase-paid',
        ])->delete();
    }
};
