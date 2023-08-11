<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

require __DIR__ . '/user_auth.php';

require __DIR__ . '/psb_section.php';

require __DIR__ . '/admin_section.php';

// coba panggil gambar dari storage

route::get('gambar', function () {
    $gambar = '';
    return view('testgambar', compact('gambar'));
});

// belum masuk ke auth

route::get('/gambar/{name}', function (String $name) {
    $gambar = storage_path('app/resiPendaftaran/' . $name);

    return response()->file($gambar);
});

// sementara
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
