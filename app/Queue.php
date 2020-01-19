<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Queue extends Model
{
    protected $primaryKey = 'queueId';

    protected $guard = 'queue';

    protected $table = 'queue';

    protected $guarded = [];

    protected $fillable = [
        'queueId', 'qType', 'room', 'outpatientId', 'staffId'
    ];

    public function outpatient()
	{
		return $this->belongsTo('app\Outpatient');
    }
    
    public function clinicstaff()
	{
		return $this->belongsTo('app\ClinicStaff');
    }
    
}
