<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //

    protected $guarded = [];

    public function faculty()
    {
        return $this->belongsTo(faculty::class);
    }

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function courses()
    {
        return $this->hasManyThrough(
            Course::class,
            Schedule::class,
            'classroom_id',
            'id',
            'id',
            'course_id',
        );
    }
}
