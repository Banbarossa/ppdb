<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ContactPsbController;
use App\Http\Controllers\Admin\JalurMasukController;
use App\Http\Controllers\Admin\jenjangController;
use App\Http\Controllers\Admin\NewStudentController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\Admin\PendaftranUlangController;
use App\Http\Controllers\Admin\PetunjukPendaftaranController;
use App\Http\Controllers\Admin\PhoneController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\KelulusanSantriBaruController;
use App\Http\Controllers\TahunController;
use Illuminate\Support\Facades\Route;

route::group(['middleware' => 'guest', 'prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('login.store');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('user-register', UserController::class);
    Route::get('registration-status/{status}', [PendaftarController::class, 'getPending'])->name('pending.pendaftar');

    Route::get('siswa-baru', [NewStudentController::class, 'index'])->name('siswa-baru.index');
    Route::get('show-siswa/{id}', [NewStudentController::class, 'show'])->name('siswa-baru.show');
    Route::get('siswa-jenjang/{id}', [NewStudentController::class, 'getJenjangPendidikan'])->name('siswa-baru.jenjang');
    Route::get('kelulusan/{id}', [KelulusanSantriBaruController::class, 'index'])->name('kelulusan.index');
    Route::post('kelulusan', [KelulusanSantriBaruController::class, 'luluskan'])->name('kelulusan.luluskan');
    Route::get('kelulusan/{id}/approve', [KelulusanSantriBaruController::class, 'luluskanSatu'])->name('kelulusan.satu');
    Route::get('daftar-ulang/jenjang/{id}', [PendaftranUlangController::class, 'index'])->name('daftarulang.index');
    Route::get('daftar-ulang/unregistered', [PendaftranUlangController::class, 'unregistered'])->name('unregistered');
    Route::get('daftar-ulang/{id}/show', [PendaftranUlangController::class, 'show'])->name('daftarulang.show');

    Route::resource('jalur-pendaftaran', JalurMasukController::class);

    Route::resource('tahun', TahunController::class);
    Route::get('activasi-tahun/{id}', [TahunController::class, 'aktifasiTahun'])->name('activasi-tahun');
    Route::resource('contact', ContactPsbController::class)->except('show');
    Route::resource('phone', PhoneController::class)->except(['index', 'show']);
    Route::get('contact-wa', [ContactPsbController::class, 'getWa'])->name('get-wa');
    Route::get('contact-media', [ContactPsbController::class, 'getMedia'])->name('get-media');
    Route::get('contact-media', [ContactPsbController::class, 'getMedia'])->name('get-media');
    Route::get('petunjuk', [PetunjukPendaftaranController::class, 'index'])->name('petunjuk');
    Route::post('petunjuk', [PetunjukPendaftaranController::class, 'store'])->name('petunjuk.store');

    Route::resource('jenjang', jenjangController::class);
    Route::resource('admin-management', AdminController::class)->except('show');
    Route::put('admin-management/{id}/update-pasword', [AdminController::class, 'updatePassword'])->name('admin-management.updatePassword');

});
