<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes from Breeze
require __DIR__.'/auth.php';

// Admin-only routes
// Route::middleware(['auth', 'is_admin'])->group(function () {
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Dashboard redirect
    Route::get('/dashboard', function() {
        return redirect()->route('students.index');
    })->name('dashboard');

    // Student CRUD
    Route::resource('students', StudentController::class);

    // Top scorers report
    Route::get('reports/top-scorers', [ReportController::class, 'topScorers'])->name('reports.top');
    });

// });

