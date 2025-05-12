<?php

namespace App\Models;

use App\Enums\AcademicYearSemester;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    protected $guarded = [];

    protected function casts()
    {
        return [
            'semester' => AcademicYearSemester::class,

        ];
    }
}
