<?php

namespace App\Models;

use App\Enums\ScheduleDay;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'day_of_week' => ScheduleDay::class,
        ];
    }
}
