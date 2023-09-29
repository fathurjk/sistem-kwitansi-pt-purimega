<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kwitansi extends Model
{
    protected $fillable = [
        'user_id',
        'nomor_kwitansi',
        'nama_lengkap',
        'alamat',
        'no_hp',
        'terbilang',
        'pembayaran',
        'keterangan',
        'lokasi',
        'no_kavling',
        'type',
        'jumlah',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}