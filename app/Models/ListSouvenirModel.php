<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListSouvenirModel extends Model
{
    protected $table = 'list_souvenirs';

    protected $fillable = [
        'nama_souvenir',
        'tanggal_perolehan',
        'harga_perolehan',
        'vendor',
        'jumlah_beli',
        'sisa',
    ];

    // Relasi ke operasional souvenir
    public function operations()
    {
        return $this->hasMany(SouvenirOperationModel::class, 'souvenir_id');
    }
}
