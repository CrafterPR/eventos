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
            \App\Models\Role::ADMINISTRATOR => [
                'user management',
                'role management',
                'events management',
                'register event',
                'edit event',
                'activate event',
                'deactivate event',
                'checkin event',
                'delete event',
                'manage events',
                'import delegates',
                'create delegate',
                'edit delegate',
                'delete delegate',
                'view delegates',
                'view reports',
                'manage staff',
                'view quick links',
                'print pass',
            ],
            \App\Models\Role::SUPER_ADMIN => [

            ]

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
