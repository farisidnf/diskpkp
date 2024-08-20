<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $data = [
        //     [
        //         'name'=>'tambah_user',
        //     ],
        //     [
        //         'name'=>'edit_user',
        //     ],
        //     [
        //         'name'=>'hapus_user',
        //     ],
        //     [
        //         'name'=>'lihat_user',
        //     ]
        // ];
        // foreach ($data as $key) {
        //     Permission::create($key);
        // }

        $data = [
            [
                'name'=>'admin',
            ],
            [
                'name'=>'user',
            ],
            [
                'name'=>'sudin',
            ],
            [
                'name'=>'pengusaha',
            ],
            [
                'name'=>'dinas',
            ]
        ];
        foreach ($data as $key) {
            Role::create($key);
        }

        // $roleAdmin = Role::findByName('admin');
        // $roleAdmin->givePermissionTo('tambah_user');
        // $roleAdmin->givePermissionTo('edit_user');
        // $roleAdmin->givePermissionTo('hapus_user');
        // $roleAdmin->givePermissionTo('lihat_user');
    }
}
