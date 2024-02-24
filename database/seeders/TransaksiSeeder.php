<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class TransaksiSeeder extends Seeder
{
    public function run()
    {
        // Hapus data sebelumnya jika ada
        $users = User::all();
        // Data sampel
        $data = [
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            [
                'transaksi_id' => Str::uuid(),
                'transaksi_user_id' => $users->skip(rand(0, $users->count() - 1))->first()->user_id,
                'transaksi_created_at' => now(),

            ],
            // Tambahkan data lain sesuai kebutuhan
            // ...
        ];

        // Masukkan data ke dalam tabel transaksis
        DB::table('transaksis')->insert($data);
    }
}
