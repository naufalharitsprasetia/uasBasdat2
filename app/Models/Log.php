<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'log_user_id',
        'log_keterangan',
        'log_created_at',
        'log_updated_at',
    ];

    protected $primaryKey = 'log_id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID
    public $timestamps = false; // Menonaktifkan fitur timestamps

    public function user()
    {
        return $this->belongsTo(User::class, 'log_user_id', 'log_id');
    }
}
