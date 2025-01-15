<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
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
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/alumni', [AlumniController::class, 'index'])->name('alumni.index');
    Route::get('/admin/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('/admin/alumni', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('/admin/alumni/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::put('/admin/alumni/{alumni}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('/admin/alumni/{alumni}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
});

require __DIR__.'/auth.php';
