<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengirimans';

    protected $fillable = [
        'tgl_kirim',
        'tgl_tiba',
        'status_kirim',
        'bukti_foto',
        'id_pesan',
        'id_user'
    ];
}
