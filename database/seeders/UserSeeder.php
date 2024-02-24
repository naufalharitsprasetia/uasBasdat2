<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {

        // Data sampel
        $data = [
            [
                'user_id' => Str::uuid(),
                'username' => 'superadmin',
                'email' => 'superadmin',
                'nama' => 'Super Admin',
                'password' => Hash::make('bismillah'),
                'level' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => Str::uuid(),
                'username' => 'admin1',
                'email' => 'admin1',
                'nama' => 'Amrico Nugraha',
                'password' => Hash::make('123456789'),
                'level' => 'penjaga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => Str::uuid(),
                'username' => 'admin2',
                'email' => 'admin2',
                'nama' => 'Fawwaz Cahyono ',
                'password' => Hash::make('123456789'),
                'level' => 'penjaga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan data user lain sesuai kebutuhan
            // ...
        ];

        // Masukkan data ke dalam tabel users
        DB::table('users')->insert($data);
    }
}
