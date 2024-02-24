<?php

namespace Database\Seeders;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DetailTransaksiSeeder extends Seeder
{
    public function run()
    {
        $transaksis = Transaksi::all();
        $barangs = Barang::all();
        // Data sampel
        $data = [
            [
                'detail_transaksi_id' => Str::uuid(),
                'detail_transaksi_transaksi_id' => $transaksis->skip(rand(0, $transaksis->count() - 1))->first()->transaksi_id,
                'detail_transaksi_barang_id' => $barangs->skip(rand(0, $barangs->count() - 1))->first()->barang_id,
                'detail_transaksi_jumlah' => '5', // Sesuaikan dengan jumlah barang
                'detail_transaksi_created_at' => now(),

            ],
            [
                'detail_transaksi_id' => Str::uuid(),
                'detail_transaksi_transaksi_id' => $transaksis->skip(rand(0, $transaksis->count() - 1))->first()->transaksi_id,
                'detail_transaksi_barang_id' => $barangs->skip(rand(0, $barangs->count() - 1))->first()->barang_id,
                'detail_transaksi_jumlah' => '10', // Sesuaikan dengan jumlah barang
                'detail_transaksi_created_at' => now(),

            ],
            [
                'detail_transaksi_id' => Str::uuid(),
                'detail_transaksi_transaksi_id' => $transaksis->skip(rand(0, $transaksis->count() - 1))->first()->transaksi_id,
                'detail_transaksi_barang_id' => $barangs->skip(rand(0, $barangs->count() - 1))->first()->barang_id,
                'detail_transaksi_jumlah' => '7', // Sesuaikan dengan jumlah barang
                'detail_transaksi_created_at' => now(),

            ],
            [
                'detail_transaksi_id' => Str::uuid(),
                'detail_transaksi_transaksi_id' => $transaksis->skip(rand(0, $transaksis->count() - 1))->first()->transaksi_id,
                'detail_transaksi_barang_id' => $barangs->skip(rand(0, $barangs->count() - 1))->first()->barang_id,
                'detail_transaksi_jumlah' => '2', // Sesuaikan dengan jumlah barang
                'detail_transaksi_created_at' => now(),

            ],
            [
                'detail_transaksi_id' => Str::uuid(),
                'detail_transaksi_transaksi_id' => $transaksis->skip(rand(0, $transaksis->count() - 1))->first()->transaksi_id,
                'detail_transaksi_barang_id' => $barangs->skip(rand(0, $barangs->count() - 1))->first()->barang_id,
                'detail_transaksi_jumlah' => '10', // Sesuaikan dengan jumlah barang
                'detail_transaksi_created_at' => now(),

            ],

        ];

        // Masukkan data ke dalam tabel detail_transaksis
        DB::table('detail_transaksis')->insert($data);
    }
}
