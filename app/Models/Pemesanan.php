<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $fillable = [
        'id_pelanggan',
        'id_jenis_bayar',
        'no_resi',
        'tgl_pesan',
        'status_pesan',
        'total_bayar'
    ];
}
