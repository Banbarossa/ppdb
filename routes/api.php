<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 'middleware' => 'verify.api.token'
Route::group(['middleware' => 'verify.api.token'], function () {
    Route::get('new-student', [\App\Http\Controllers\Api\getDataStudent::class, 'getAll']);
    Route::get('new-student-detail/{nisn}', [\App\Http\Controllers\Api\getDataStudent::class, 'getOne']);
    Route::get('status', [\App\Http\Controllers\Api\getDataStudent::class, 'status']);

});
