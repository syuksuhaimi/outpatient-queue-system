<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ClinicStaff extends Authenticatable
{
    protected $primaryKey = 'staffId';

    protected $guard = 'clinicstaff';

    protected $table = 'clinicStaffs';

    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $fillable = [
        'staffId', 'staffName', 'phone', 'gender', 'position','email','password',
    ];


}
