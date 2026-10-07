<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperationalSouvenirModel extends Model
{
    protected $table = 'operational_souvenirs';

    protected $fillable = [
        'tanggal',
        'employee_id',
        'keperluan',
        'souvenir_id',
        'jumlah',
    ];

    // relasi employee
    public function employee()
    {
        return $this->belongsTo(employeeModel::class, 'employee_id');
    }

    // relasi souvenir
    public function souvenir()
    {
        return $this->belongsTo(ListSouvenirModel::class, 'souvenir_id');
    }
}
