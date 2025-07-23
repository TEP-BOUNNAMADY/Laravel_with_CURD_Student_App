<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/students'));

// Authentication routes (standard Laravel Breeze/Jetstream)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('students', StudentController::class);

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index'); // Show all teachers with search
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store'); // Store a new teacher
Route::get('/teachers/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit'); // Show form to edit a teacher
Route::put('/teachers/{id}', [TeacherController::class, 'update'])->name('teachers.update'); // Update an existing teacher
Route::delete('/teachers/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy'); // Delete a teacher

