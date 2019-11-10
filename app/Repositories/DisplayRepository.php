<?php

namespace App\Repositories;

use App\Queue;
use Carbon\Carbon;

class DisplayRepository
{
    public function getDisplayData()
    {
        $queues = Queue::with('outpatient')
                    ->where('qTime', Carbon::now()->format('Y-m-d'))
                    ->orderBy('queueId', 'desc')
                    ->take(4)
                    ->get();

        $data = [];
        for ($i=0;$i<4;$i++) {
            $data[$i]['queueId'] = (isset($calls[$i]))?$calls[$i]->queueId:'NIL';
            // $data[$i]['call_number'] = (isset($calls[$i]))?(($calls[$i]->department->letter!='')?$calls[$i]->department->letter.' '.$calls[$i]->number:$calls[$i]->number):'NIL';
            $data[$i]['room'] = (isset($calls[$i]))?$calls[$i]->room:'NIL';
        }

        return $data;
    }
}