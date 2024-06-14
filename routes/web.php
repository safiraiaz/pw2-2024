<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/kabar', function () {
        return view('kondisi');
    });

    Route::get('/nilai', function () {
        return view('nilai');
    });

    Route::get('/admin', [AdminController::class, 'index']);
    // Pasien
    Route::get('/pasien', [PasienController::class, 'index'])->name('pasiens.index');
    Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasiens.create');
    Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasiens.store');
    Route::post('/pasien/{pasien}', [PasienController::class, 'show'])->name('pasiens.show');
    Route::get('/pasien/{pasien}/edit', [PasienController::class, 'edit'])->name('pasiens.edit');
    Route::put('/pasien/{pasien}', [PasienController::class, 'update'])->name('pasiens.update');
    Route::delete('/pasien/{pasien}', [PasienController::class, 'destroy'])->name('pasiens.destroy');

    // Kelurahan
    Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahans.index');
    Route::get('/kelurahan/create', [KelurahanController::class, 'create'])->name('kelurahans.create');
    Route::post('/kelurahan/store', [KelurahanController::class, 'store'])->name('kelurahans.store');
    Route::post('/kelurahan/{kelurahan}', [KelurahanController::class, 'show'])->name('kelurahans.show');
    Route::get('/kelurahan/{kelurahan}/edit', [KelurahanController::class, 'edit'])->name('kelurahans.edit');
    Route::put('/kelurahan/{kelurahan}', [KelurahanController::class, 'update'])->name('kelurahans.update');
    Route::delete('/kelurahan/{kelurahan}', [KelurahanController::class, 'destroy'])->name('kelurahans.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('page');
});

require __DIR__.'/auth.php';