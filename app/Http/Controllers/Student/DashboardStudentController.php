<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return inertia('Students/Dashboard', [
            'page_setting' => [
                'title' => 'Dashboard',
                'subtitle' => 'Menampilkan semua statistik pada platform ini',
            ]
        ]);
    }
}
