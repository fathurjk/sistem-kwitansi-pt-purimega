<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    protected $fillable = [
        'nomor_kwitansi',
        'nama_lengkap',
        'alamat',
        'no_hp',
        'uang_sebanyak',
        'pembayaran',
        'lokasi',
        'no_kavling',
        'type',
        'luas',
        'discount',
        'jumlah',
    ];
}