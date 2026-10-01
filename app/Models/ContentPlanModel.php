<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentPlanModel extends Model
{
     protected $table = 'content_plans';
    protected $fillable = [
        'tanggal_upload',
        'time_upload',
        'jenis_konten',
        'judul_konten',
        'brief',
        'link_draft',
        'caption',
        'feedback',
        'status',
    ];
}
