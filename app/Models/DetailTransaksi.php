<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'detail_transaksi_id',
        'detail_transaksi_barang_id',
        'detail_transaksi_transaksi_id',
        'detail_transaksi_jumlah',
        'detail_transaksi_created_at',
    ];

    protected $primaryKey = 'detail_transaksi_id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID
    public $timestamps = false; // Menonaktifkan fitur timestamps

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'detail_transaksi_barang_id', 'barang_id');
    }
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'detail_transaksi_transaksi_id', 'transaksi_id');
    }
}
