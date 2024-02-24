<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangSeeder extends Seeder
{
    public function run()
    {

        // Data sampel
        $data = [
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Cat Tembok Putih',
                'barang_harga' => 25000,
                'barang_stok' => 50,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Paku Besi 4 inch',
                'barang_harga' => 5000,
                'barang_stok' => 100,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Genteng Beton Flat',
                'barang_harga' => 35000,
                'barang_stok' => 30,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Besi Hollow 2x2 inch',
                'barang_harga' => 15000,
                'barang_stok' => 80,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Cat Besi Anti Karat',
                'barang_harga' => 30000,
                'barang_stok' => 40,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Tutup Lubang Wastafel',
                'barang_harga' => 5000,
                'barang_stok' => 120,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Kusen Pintu Kayu Meranti',
                'barang_harga' => 120000,
                'barang_stok' => 25,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Lem Tembak Multiguna',
                'barang_harga' => 8000,
                'barang_stok' => 60,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Gergaji Kayu Tangan',
                'barang_harga' => 15000,
                'barang_stok' => 70,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Kawat Las Argon',
                'barang_harga' => 45000,
                'barang_stok' => 35,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Pipa PVC 3/4 inch',
                'barang_harga' => 7000,
                'barang_stok' => 90,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Engsel Pintu Stainless Steel',
                'barang_harga' => 10000,
                'barang_stok' => 55,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Lantai Keramik 60x60cm',
                'barang_harga' => 40000,
                'barang_stok' => 20,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Kawat Harmonika Galvanis',
                'barang_harga' => 25000,
                'barang_stok' => 40,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Tang Potong Besi 8 inch',
                'barang_harga' => 12000,
                'barang_stok' => 65,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Cat Kayu Outdoor',
                'barang_harga' => 28000,
                'barang_stok' => 30,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Gypsum Board 120x240cm',
                'barang_harga' => 80000,
                'barang_stok' => 15,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Kunci Pintu Digital',
                'barang_harga' => 150000,
                'barang_stok' => 10,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Pipa Besi 1 inch Tebal',
                'barang_harga' => 20000,
                'barang_stok' => 50,
            ],
            [
                'barang_id' => Str::uuid(),
                'barang_nama' => 'Keran Air Panas-Dingin',
                'barang_harga' => 35000,
                'barang_stok' => 25,
            ],
            // Tambahkan barang lain sesuai kebutuhan
            // ...
        ];

        // Masukkan data ke dalam tabel barangs
        DB::table('barangs')->insert($data);
    }
}