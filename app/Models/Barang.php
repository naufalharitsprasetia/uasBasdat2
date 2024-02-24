<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'barang_id',
        'barang_stok',
        'barang_harga',
        'barang_nama',
        'barang_created_at',
        'barang_updated_at',
    ];

    protected $primaryKey = 'barang_id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID
    public $timestamps = false; // Menonaktifkan fitur timestamps

    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'detail_transaksi_barang_id', 'barang_id');
    }
}
