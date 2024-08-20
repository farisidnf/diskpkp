<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $password = '123456';
        User::create([
            'username' => 'admin@gmail.com',
            'name' => 'Admin',
            'last_name' => 'DKPKP',
            'nrk' => '1',
            'role' => 'admin',
            'status' => 1,
            'jabatan' => '1',
            'bidang' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make($password), // password
        ]);
        User::create([
            'username' => 'user@gmail.com',
            'name' => 'User',
            'last_name' => 'DKPKP',
            'nrk' => '1',
            'role' => 'user',
            'status' => 1,
            'jabatan' => '1',
            'bidang' => '1',
            'email' => 'user@gmail.com',
            'password' => Hash::make($password), // password
        ]);
        User::create([
            'username' => 'dinas@gmail.com',
            'name' => 'Dinas',
            'last_name' => 'DKPKP',
            'nrk' => '1',
            'role' => 'dinas',
            'status' => 1,
            'jabatan' => '1',
            'bidang' => '1',
            'email' => 'dinas@gmail.com',
            'password' => Hash::make($password), // password
        ]);
        User::create([
            'username' => 'pengusaha@gmail.com',
            'name' => 'Pengusaha',
            'last_name' => 'DKPKP',
            'nrk' => '1',
            'role' => 'pengusaha',
            'status' => 1,
            'jabatan' => '1',
            'bidang' => '1',
            'email' => 'pengusaha@gmail.com',
            'password' => Hash::make($password), // password
        ]);
    }
}
