<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions_by_role = [
            'administrator' => [
                'user management',
                'role management',
                'event management',
                'register event',
                'edit event',
                'activate event',
                'deactivate event',
                'delete event',
                'ticket management',
                'booth management',
                'purchased tickets',
                'view booth bookings',
                'view reserve details',
                'view purchased tickets',
                'reserve booth',
                'coupon management',
                'generate coupon',
                'edit booth details',
                'revoke booth booking',
                'send payment reminders',
                'manage events',
                'add speakers',
                'manage speakers',
                'edit delegate',
                'financial management',
                'view delegates',
                'view exhibitors',
                'view reports',
                'manage summits',
                'update payment manually',
                'send emails',
                'manage users',
                'view dashboard',
                'login as delegate',
                'redeem coupon for delegates',
                'secretariat',
                'activate coupon',
                'edit coupon capacity',
            ],

        ];

        //Schema::disableForeignKeyConstraints();
        //DB::table('roles')->truncate();
        //DB::table('permissions')->truncate();

        foreach ($permissions_by_role as $role) {
            foreach ($role as $permission) {
                Permission::updateOrCreate(['name' => Str::slug($permission)], ['name' => Str::slug($permission), 'display_name' => Str::ucfirst($permission)]);
            }
        }

        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($permissions as $permission) {
                $full_permissions_list[] = Str::slug($permission);
            }

            Role::findOrCreate($role)->syncPermissions($full_permissions_list);
        }
    }
}
