<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['admin'])->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'Dashboard'])->name('dashboard');
        Route::resource('user', AdminUserController::class);
//        Route::put('user/{user}/active', [AdminUserController::class, 'activate'])->name('user.active');
//        Route::put('user/{user}/inactive', [AdminUserController::class, 'deactivate'])->name('user.inactive');

    });
});

