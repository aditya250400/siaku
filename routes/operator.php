<?php

use App\Http\Controllers\Operator\DashboardOperatorController;
use App\Http\Controllers\Operator\StudentOperatorController;
use Illuminate\Support\Facades\Route;

Route::prefix('operators')->middleware(['auth', 'role:Operator'])->group(function () {

    //dashboard
    Route::get('dashboard', DashboardOperatorController::class)->name('operators.dashboard');

    // Student
    Route::controller(StudentOperatorController::class)->group(function () {
        Route::get('students', 'index')->name('operators.students.index');
        Route::get('students/create', 'create')->name('operators.students.create');
        Route::post('students/create', 'store')->name('operators.students.store');
        Route::get('students/edit/{student:student_number}', 'edit')->name('operators.students.edit');
        Route::put('students/edit/{student:student_number}', 'update')->name('operators.students.update');
        Route::delete('students/destroy/{student:student_number}', 'destroy')->name('operators.students.destroy');
    });
});
