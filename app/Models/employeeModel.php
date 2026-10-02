<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employeeModel extends Model
{
    protected $table = 'employees';

    protected $fillable = [

        'nama',
        'nip',
        'direktorat',
        'bidang',
        'email',
        'password',
        'role_id',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION ROLE
    |--------------------------------------------------------------------------
    */

    public function role()
    {
        return $this->belongsTo(
            MasterRoleModel::class,
            'role_id'
        );
    }
}
