<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class employeeModel extends Authenticatable
{
    use Notifiable;

    protected $table = 'employees';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $fillable = [

        'nama',
        'nip',
        'direktorat',
        'bidang',
        'email',
        'password',
        'role_id',

    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

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
