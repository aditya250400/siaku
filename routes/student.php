<?php

use App\Http\Controllers\Student\DashboardStudentController;
use App\Http\Controllers\Student\StudyPlanStudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->middleware(['auth', 'role:Student'])->group(function () {

    //dashboard
    Route::get('dashboard', DashboardStudentController::class)->name('students.dashboard');

    // study plan
    Route::controller(StudyPlanStudentController::class)->group(function () {
        Route::get('study-plans', 'index')->name('students.study-plans.index');
        Route::get('study-plans/create', 'create')->name('students.study-plans.create');
        Route::post('study-plans/create', 'store')->name('students.study-plans.store');
        Route::get('study-plans/detail/{studyPlan}', 'show')->name('students.study-plans.show');
    });
});
