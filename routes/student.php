<?php

use App\Http\Controllers\Student\DashboardStudentController;
use Illuminate\Support\Facades\Route;

Route::prefix('students')->group(function () {

    //dashboard
    Route::get('dashboard', DashboardStudentController::class)->name('admin.dashboard');
});
