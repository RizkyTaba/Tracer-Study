<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BidangKeahlianController;
use App\Http\Controllers\TahunLulusController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramKeahlianController;

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

    // Alumni
    Route::get('/admin/alumni', [AlumniController::class, 'index'])->name('alumni.index');
    Route::get('/admin/alumni/create', [AlumniController::class, 'create'])->name('alumni.create');
    Route::post('/admin/alumni', [AlumniController::class, 'store'])->name('alumni.store');
    Route::get('/admin/alumni/{alumni}/edit', [AlumniController::class, 'edit'])->name('alumni.edit');
    Route::put('/admin/alumni/{alumni}', [AlumniController::class, 'update'])->name('alumni.update');
    Route::delete('/admin/alumni/{alumni}', [AlumniController::class, 'destroy'])->name('alumni.destroy');
    // ----------------

    // Bidang Keahlian
    Route::get('/admin/bidang_keahlian', [BidangKeahlianController::class, 'index'])->name('bidang_keahlian.index');
    Route::get('/admin/bidang_keahlian/create', [BidangKeahlianController::class, 'create'])->name('bidang_keahlian.create');
    Route::get('/admin/bidang_keahlian/{bidang_keahlian}/edit', [BidangKeahlianController::class, 'edit'])->name('bidang_keahlian.edit');
    Route::resource('admin/bidang_keahlian', BidangKeahlianController::class);
    // ----------------

    // Program Keahlian
    Route::get('admin/program_keahlian', [ProgramKeahlianController::class, 'index'])->name('program_keahlian.index');
    Route::get('admin/program_keahlian/create', [ProgramKeahlianController::class, 'create'])->name('program_keahlian.create');
    Route::get('admin/program_keahlian/{program_keahlian}/edit', [ProgramKeahlianController::class, 'edit'])->name('program_keahlian.edit');
    Route::resource('admin/program_keahlian', ProgramKeahlianController::class);
    //----------------

    // Tahun Lulus
    Route::get('admin/tahun_lulus', [TahunLulusController::class, 'index'])->name('tahun_lulus.index');
    Route::get('admin/tahun_lulus/create', [TahunLulusController::class, 'create'])->name('tahun_lulus.create');
    Route::get('admin/tahun_lulus/{tahun_lulus}/edit', [TahunLulusController::class, 'edit'])->name('tahun_lulus.edit');
    Route::resource('admin/tahun_lulus', TahunLulusController::class);
    //----------------

    
});

require __DIR__.'/auth.php';
