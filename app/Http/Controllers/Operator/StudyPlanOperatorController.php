<?php

namespace App\Http\Controllers\Operator;

use App\Enums\StudyPlanStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Operator\StudyPlanOperatorResource;
use App\Models\Student;
use App\Models\StudyPlan;
use Illuminate\Http\Request;

class StudyPlanOperatorController extends Controller
{
    public function index(Student $student)
    {
        $studyPlans = StudyPlan::query()
            ->select(['id', 'student_id', 'academic_year_id', 'notes', 'status', 'semester', 'created_at'])
            ->filter(request()->only(['search']))
            ->sorting(request()->only(['field', 'direction']))
            ->where('student_id', $student->id)
            ->with(['student', 'academicYear', 'schedules'])
            ->paginate(request()->load ?? 10);

        return inertia('Operators/Students/StudyPlans/Index', [
            'page_setting' => [
                'title' => 'Kartu Rencana Studi',
                'subtitle' => "Menampilkan semua KRS "
            ],
            'studyPlans' => StudyPlanOperatorResource::collection($studyPlans)->additional([
                'meta' => [
                    'has_pages' => $studyPlans->hasPages()
                ]
            ]),
            'student' => $student,
            'state' => [
                'page' => request()->page ?? 1,
                'search' => request()->search ?? '',
                'load' => 10
            ],
            'statuses' => StudyPlanStatus::options(),

        ]);
    }
}
