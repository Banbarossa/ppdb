<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\NewStudentController;
use App\Http\Controllers\Admin\UserController;
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
    Route::resource('tahun', TahunController::class);

    Route::get('siswa-baru', [NewStudentController::class, 'index'])->name('siswa-baru.index');
    Route::get('siswa-baru/{id}', [NewStudentController::class, 'show'])->name('siswa-baru.show');

});
