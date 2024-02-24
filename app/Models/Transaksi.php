<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksi_id',
        'transaksi_user_id',
        'transaksi_created_at',
    ];

    protected $primaryKey = 'transaksi_id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID
    public $timestamps = false; // Menonaktifkan fitur timestamps

    public function user()
    {
        return $this->belongsTo(User::class, 'transaksi_user_id', 'user_id');
    }
}
