<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Outpatient extends Authenticatable
{
    protected $primaryKey = 'outpatientId';

    protected $guard = 'outpatient';

    protected $table = 'outpatients';

    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->password;
    }

    protected $fillable = [
        'outpatientId', 'name', 'icNumber', 'age', 'address','gender', 'email', 'password'
    ];

}
