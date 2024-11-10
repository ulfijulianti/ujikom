<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AgendaController;
use App\Http\Controllers\Api\InformasiController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\GaleryController;
use App\Http\Controllers\Api\ProfileController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::apiResource('agenda', AgendaController::class);

Route::apiResource('informasi', InformasiController::class);

Route::apiResource('kategori', KategoriController::class);

Route::apiResource('photo', PhotoController::class);

Route::apiResource('galery', GaleryController::class);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index']);
Route::put('/profile', [ProfileController::class, 'update']);
Route::delete('/profile', [ProfileController::class, 'destroy']);
});