<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeputusanDireksiModel extends Model
{
    protected $table = 'keputusandireksi';

    protected $fillable = [
        'nomor',
        'judul',
        'tanggal_disahkan',
        'tanggal_berlaku',
        'status',
        'dokumen_softcopy',
    ];
}
