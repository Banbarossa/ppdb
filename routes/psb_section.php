<?php

use App\Http\Controllers\PsbUser\DaftarUlangController;
use App\Http\Controllers\PsbUser\DashboardController;
use App\Http\Controllers\PsbUser\KartuUjianController;
use App\Http\Controllers\PsbUser\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'psb', 'as' => 'psb.'], function () {
    Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
});

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'psb', 'as' => 'psb.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('profile', [ProfileController::class, 'store'])->name('profile.store');

    Route::get('wali', [ProfileController::class, 'waliCreate'])->name('wali');
    Route::post('wali', [ProfileController::class, 'walistore'])->name('wali.store');

    Route::get('sekolah', [ProfileController::class, 'sekolahCreate'])->name('sekolah');
    Route::post('sekolah', [ProfileController::class, 'sekolahstore'])->name('sekolah.store');

    Route::get('kartu-ujian', [KartuUjianController::class, 'index'])->name('kartuujian.index');

    Route::group(['middleware' => 'daftar.ulang'], function () {

        Route::get('daftar-ulang-data', [DaftarUlangController::class, 'index'])->name('daftar-ulang.index');
        Route::post('daftar-ulang-data', [DaftarUlangController::class, 'storeData'])->name('daftar-ulang.storeData');

        Route::get('upload-berkas', [DaftarUlangController::class, 'berkas'])->name('upload-berkas.index');
        Route::post('upload-berkas', [DaftarUlangController::class, 'berkasStore'])->name('upload-berkas.store');

        Route::get('berkas/{name}', function ($name) {
            $storagepath = storage_path('app/berkas/' . $name);
            return response()->file($storagepath);
        })->name('berkas');
    });

});
