<?php

namespace App\Models;

use App\Enums\StudyPlanStatus;
use Illuminate\Database\Eloquent\Model;

class StudyPlan extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'status' => StudyPlanStatus::class,
        ];
    }
}
