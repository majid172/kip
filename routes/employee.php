<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\Auth\EmployeeAuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('employee')->name('employee.')->group(function () {
//    Route::middleware(['guest:employee', 'PreventBackHistory'])->group(function () {
        Route::view('/login', 'employee.auth.login')->name('login');
        Route::view('/register', 'employee.auth.register')->name('register');
        Route::post('/register', [EmployeeAuthController::class, 'register'])->name('post.register');
        Route::post('/login', [EmployeeAuthController::class, 'login'])->name('post.login');
//    });
    Route::middleware(['auth:employee', 'isEmployee', 'PreventBackHistory'])->group(function () {
        Route::get('/dashboard-activity', [\App\Http\Controllers\Employee\EmployeeDashboardController::class, 'activity'])->name('dashboard-activity');
        Route::resource('/dashboard', \App\Http\Controllers\Employee\EmployeeDashboardController::class);
//        Route::resource('/department', EmployeeDepartmentController::class);
        Route::resource('/tasks', EmployeeTaskController::class);
        Route::resource('/tasks', \App\Http\Controllers\Employee\EmployeeTaskController::class);
//        Route::resource('/own-task', EmployeeOwnTaskController::class);
//        Route::resource('/own-task-list', EmployeeOwnTaskListController::class);
        Route::resource('/other-work-list', \App\Http\Controllers\Employee\OtherWorKListController::class);
        Route::resource('/profile', \App\Http\Controllers\Employee\EmployeeProfileController::class);
        Route::post('/logout', [\App\Http\Controllers\Employee\Auth\EmployeeAuthController::class, 'logout'])->name('logout');
    });
});
