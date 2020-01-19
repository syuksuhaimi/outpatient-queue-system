<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $primaryKey = 'id';

    protected $guard = 'call';

    protected $table = 'calls';

    protected $guarded = [];

    protected $fillable = [
        'id', 'queueId', 'room', 'outpatientId', 'staffId'
    ];

    public function queue()
	{
		return $this->belongsTo('app\Queue');
    }

    public function outpatient()
	{
		return $this->belongsTo('app\Outpatient');
    }
    
    public function clinicstaff()
	{
		return $this->belongsTo('app\ClinicStaff');
    }
}
