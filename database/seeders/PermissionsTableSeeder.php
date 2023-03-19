<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'id'    =>  1,
                'name'  =>  'user_access',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  2,
                'name'  =>  'user_create',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  3,
                'name'  =>  'user_edit',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  4,
                'name'  =>  'user_show',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  5,
                'name'  =>  'user_delete',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  6,
                'name'  =>  'role_access',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  7,
                'name'  =>  'role_create',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  8,
                'name'  =>  'role_edit',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  9,
                'name'  =>  'role_show',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  10,
                'name'  =>  'role_delete',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  11,
                'name'  =>  'user_management_access',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  12,
                'name'  =>  'user_excel_export',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  13,
                'name'  =>  'station_access',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  14,
                'name'  =>  'station_create',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  15,
                'name'  =>  'station_edit',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  16,
                'name'  =>  'station_delete',
                'guard_name' => 'web'
            ],
            [
                'id'    =>  17,
                'name'  =>  'station_show',
                'guard_name' => 'web'
            ],
        ];

        Permission::insert($permissions);
    }
}
