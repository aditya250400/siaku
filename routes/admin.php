<?php

use App\Http\Controllers\Admin\DashboardAdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    //dashboard
    Route::get('dashboard', DashboardAdminController::class)->name('admin.dashboard');
});
