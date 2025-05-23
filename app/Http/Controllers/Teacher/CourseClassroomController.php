<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Course;
use App\Models\Schedule;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseClassroomController extends Controller
{
    public function index(Course $course, Classroom $classroom)
    {
        $schedule = Schedule::query()
            ->where('course_id', $course->id)
            ->where('classroom_id', $classroom->id)->first();

        $students = Student::query()
            ->where('faculty_id', $classroom->faculty_id)
            ->where('departement_id', $classroom->departement_id)
            ->where('classroom_id', $classroom->classroom_id)
            ->filter(request()->only(['search']))
            ->whereHas('user', function($query) {
                $query->whereHas('roles', fn($query) => $query->where('name', 'Student'));
            })
            ->whereHas('studyPlans', function($query) use ($schedule){
                $query->where('academic_year_id', activeAcademicYear()->id)->approved()
                ->whereHas('schedules', fn($query) => $query->where('schedule_id', $schedule->id));
            })

    }
}
