<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/admin-dashboard', [DashboardController::class, 'adminDash'])->name('admin.dashboard')->middleware('role:admin');
    Route::put('/teacher/approve/{user}', [RegisteredUserController::class, 'approveUser'])->middleware('role:admin');


     Route::get('/teacher-dashboard', [DashboardController::class, 'teacherDash'])->name('teacher.dashboard');


     Route::post('/course/store', [CourseController::class, 'store'])->middleware('role:teacher');
     Route::post('/course/enrollement', [CourseController::class, 'toEnroll']);
});

require __DIR__.'/auth.php';
