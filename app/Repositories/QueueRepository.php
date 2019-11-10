<?php

namespace App\Repositories;

use App\Queue;
use Carbon\Carbon;

class QueueRepository
{
    public function getCustomersWaiting(Queue $queue)
    {
        return $queue()
                    // ->where('called', 0)
                    ->where('qTime', '>', Carbon::now()->format('Y-m-d 00:00:00'))
                    ->count();
    }
}