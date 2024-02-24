<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TransaksiSeeder::class,
            BarangSeeder::class,
            DetailTransaksiSeeder::class,
        ]);

        DB::unprepared("
            CREATE TRIGGER before_update_barangs
            BEFORE UPDATE ON barangs
            FOR EACH ROW
            BEGIN
                -- Memasukkan data ke tabel logs dengan log_id menggunakan UUID
                INSERT INTO logs (log_id, log_username, log_keterangan, log_created_at)
                VALUES (UUID(), NULL, CONCAT('Update barang dengan id ', OLD.barang_id, '. Kolom yang diupdate: ', 
                                    CASE 
                                        WHEN NEW.barang_nama != OLD.barang_nama THEN CONCAT('barang_nama dari ''', OLD.barang_nama, ''' ke ''', NEW.barang_nama, ''', ') 
                                        ELSE '' 
                                    END,
                                    CASE 
                                        WHEN NEW.barang_harga != OLD.barang_harga THEN CONCAT('barang_harga dari ''', OLD.barang_harga, ''' ke ''', NEW.barang_harga, ''', ') 
                                        ELSE '' 
                                    END,
                                    CASE 
                                        WHEN NEW.barang_stok != OLD.barang_stok THEN CONCAT('barang_stok dari ''', OLD.barang_stok, ''' ke ''', NEW.barang_stok, ''', ') 
                                        ELSE '' 
                                    END),
                        NOW());
            END;
        ");
        DB::unprepared('
            CREATE TRIGGER after_insert_barangs
            AFTER INSERT ON barangs
            FOR EACH ROW
            BEGIN
                -- Memasukkan data ke tabel logs dengan log_id menggunakan UUID
                INSERT INTO logs (log_id, log_username, log_keterangan, log_created_at)
                VALUES (UUID(), NULL, CONCAT("Insert barang dengan id ", NEW.barang_id, ". Kolom yang diinsert: ",
                                    CONCAT(
                                        "barang_nama: \"", NEW.barang_nama, "\", ",
                                        "barang_harga: \"", NEW.barang_harga, "\", ",
                                        "barang_stok: \"", NEW.barang_stok, "\""
                                    )),
                        NOW());
            END;
        ');
        DB::unprepared('
            CREATE PROCEDURE totalBarang()
            BEGIN
                SELECT count(*) FROM barangs;
            END
        ');
    }
}
