<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'nik' => '12007642',
                'telp' => '08123456789'
            ],
            [
                'name' => 'Petugas',
                'email' => 'petugas@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'petugas',
                'nik' => '12007643',
                'telp' => '087828999999'
            ],
            [
                'name' => 'Masyarakat',
                'email' => 'masyarakat@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'masyarakat',
                'nik' => '12007644',
                'telp' => '087828999998'
            ]
        ];

        User::insert($data);
    }
}
