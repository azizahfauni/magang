<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InputDataController; // Tambahkan namespace controller Anda

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

// Route default untuk user (bawaan Laravel)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// API baru untuk InputData
Route::get('/input-data', [InputDataController::class, 'index']); // Mendapatkan semua data dengan filter fleksibel
Route::get('/input-data/bidang/{bidang}', [InputDataController::class, 'filterByBidang']); // Filter berdasarkan bidang
Route::get('/input-data/tahun/{tahun}', [InputDataController::class, 'filterByYear']); // Filter berdasarkan tahun
