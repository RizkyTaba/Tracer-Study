<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\BidangKeahlianController;
use App\Http\Controllers\KonsentrasiKeahlianController;
use App\Http\Controllers\TahunLulusController;
use App\Http\Controllers\StatusAlumniController;
use App\Http\Controllers\TracerKuliahController;
use App\Http\Controllers\TracerKerjaController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/user/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/user/Pekerjaan', [UserController::class, 'pekerjaan'])->name('user.Pekerjaan');
    Route::post('/user/pekerjaan/store', [UserController::class, 'storePekerjaan'])->name('user.pekerjaan.store');
    Route::put('/user/pekerjaan/update/{id}', [UserController::class, 'updatePekerjaan'])->name('user.pekerjaan.update');
    Route::delete('/user/pekerjaan/{id}', [UserController::class, 'destroyPekerjaan'])->name('user.pekerjaan.destroy');
    Route::get('/user/Kuliah', [UserController::class, 'kuliah'])->name('user.Kuliah');
    Route::post('/user/kuliah/store', [UserController::class, 'storeKuliah'])->name('user.kuliah.store');
    Route::put('/user/kuliah/update/{id}', [UserController::class, 'updateKuliah'])->name('user.kuliah.update');
    Route::post('/user/testimoni/store', [UserController::class, 'storeTestimoni'])->name('user.testimoni.store');
    Route::put('/user/testimoni/update/{id}', [UserController::class, 'updateTestimoni'])->name('user.testimoni.update');
    Route::delete('/user/testimoni/delete/{id}', [UserController::class, 'deleteTestimoni'])->name('user.testimoni.delete');
    Route::get('/user/profil', [UserController::class, 'profil'])->name('user.profil');
    Route::get('/user/profil/edit', [UserController::class, 'editAlumni'])->name('user.editAlumni');
    Route::put('/user/profil/update/{id}', [UserController::class, 'updateAlumni'])->name('user.updateAlumni');
});

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // // Alumni
    Route::get('/admin/alumni', [AlumniController::class, 'index'])->name('admin.alumni.index');
    Route::get('/admin/alumni/create', [AlumniController::class, 'create'])->name('admin.alumni.create');
    Route::post('/admin/alumni', [AlumniController::class, 'store'])->name('admin.alumni.store');
    Route::get('/admin/alumni/{alumni}/edit', [AlumniController::class, 'edit'])->name('admin.alumni.edit');
    Route::put('admin/alumni/{alumni}', [AlumniController::class, 'update'])->name('admin.alumni.update');
    Route::delete('admin/alumni/{alumni}', [AlumniController::class, 'destroy'])->name('admin.alumni.destroy');
    Route::get('admin/alumni/{id}', [AlumniController::class, 'show'])->name('admin.alumni.show');
    Route::resource('admin/alumni', AlumniController::class);
    // ----------------

    

    // Tahun Lulus
    Route::resource('tahun_lulus', TahunLulusController::class);
    Route::get('/tahun_lulus/create', [TahunLulusController::class, 'create'])->name('tahun_lulus.create');
    Route::get('/tahun_lulus/{tahun_lulus}/edit', [TahunLulusController::class, 'edit'])->name('tahun_lulus.edit');
    //----------------


    // Bidang Keahlian
    Route::get('/admin/bidang_keahlian', [BidangKeahlianController::class, 'index'])->name('bidang_keahlian.index');
    Route::get('/admin/bidang_keahlian/create', [BidangKeahlianController::class, 'create'])->name('bidang_keahlian.create');
    Route::get('/admin/bidang_keahlian/{bidang_keahlian}/edit', [BidangKeahlianController::class, 'edit'])->name('bidang_keahlian.edit');
    Route::resource('admin/bidang_keahlian', BidangKeahlianController::class);
    // ----------------

    // Program Keahlian
    Route::resource('admin/program_keahlian', ProgramKeahlianController::class);
    //----------------

    // Tahun Lulus
    Route::get('admin/tahun_lulus', [TahunLulusController::class, 'index'])->name('tahun_lulus.index');
    Route::get('admin/tahun_lulus/create', [TahunLulusController::class, 'create'])->name('tahun_lulus.create');
    Route::get('admin/tahun_lulus/{tahun_lulus}/edit', [TahunLulusController::class, 'edit'])->name('tahun_lulus.edit');
    Route::resource('admin/tahun_lulus', TahunLulusController::class);
    //----------------

    // Konsentrasi Keahlian
    Route::get('admin/konsentrasi_keahlian', [KonsentrasiKeahlianController::class, 'index'])->name('konsentrasi_keahlian.index');
    Route::get('admin/konsentrasi_keahlian/create', [KonsentrasiKeahlianController::class, 'create'])->name('konsentrasi_keahlian.create');
    Route::get('admin/konsentrasi_keahlian/{konsentrasi_keahlian}/edit', [KonsentrasiKeahlianController::class, 'edit'])->name('konsentrasi_keahlian.edit');
    Route::resource('admin/konsentrasi_keahlian', KonsentrasiKeahlianController::class);
    //----------------

    // Status Alumni
    Route::get('admin/status_alumni', [StatusAlumniController::class, 'index'])->name('status_alumni.index');
    Route::get('admin/status_alumni/create', [StatusAlumniController::class, 'create'])->name('status_alumni.create');
    Route::get('admin/status_alumni/{status_alumni}/edit', [StatusAlumniController::class, 'edit'])->name('status_alumni.edit');
    Route::resource('admin/status_alumni', StatusAlumniController::class);

     // Tracer Kuliah
     Route::get('admin/tracer_kuliah', [TracerKuliahController::class, 'index'])->name('tracer_kuliah.index');
     Route::resource('tracer_kuliah', TracerKuliahController::class)->except(['index']);
 
     // Tracer Kerja
     Route::get('admin/tracer_kerja', [TracerKerjaController::class, 'index'])->name('tracer_kerja.index');
     Route::resource('tracer_kerja', TracerKerjaController::class)->except(['index']);
 
     // Testimoni
     Route::get('admin/testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
     Route::resource('testimoni', TestimoniController::class)->except(['index']);

    Route::get('/admin/search-student', [AlumniController::class, 'searchStudent'])->name('admin.search.student');

    Route::get('/admin/profile/edit', [AdminController::class, 'editProfile'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
});

require __DIR__.'/auth.php';
