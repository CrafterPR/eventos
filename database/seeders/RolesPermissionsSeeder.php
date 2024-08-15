<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions_by_role = [
           Role::SUPER_ADMIN => [
                'view staff',
                'create staff',
                'edit staff',
                'delete staff',
                'view roles',
                'create role',
                'edit role',
                'delete role',
                'view voters',
                'create voter',
                'disable voter',
                'enable voter',
                'view voting periods',
                'create voting period',
                'enable voting period',
                'close voting period',
                'delete voting period',
                'view voting positions',
                'create voting position',
                'enable voting position',
                'disable voting position',
                'delete voting position',
                'view contestants',
                'create contestant',
                'enable contestant',
                'disable contestant',
                'delete contestant',
                'view voting period activity logs',
                'send voting reminders',
                'view vote results',
                'view reports',
                'view dashboard',
            ],

        ];

        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();

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
