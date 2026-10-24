<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// P2: endpoint statis
Route::get('/hello', function () {
    return 'Halo dari Laravel 12!';
});

Route::get('/info', function () {
    return response()->json([
        'app' => 'Task API',
        'version' => '1.0',
        'author' => 'BTNG DNCC 2026',
    ]);
});

Route::post('/hello', function () {
    return response()->json([
        'message' => 'Request POST berhasil diterima!',
    ]);
});

// Tugas P2: ganti nama & NIM-mu
Route::get('/profil', function () {
    return response()->json([
        'nama' => 'Dywa Rusydi R',
        'nim' => 'A11.2026.16980',
    ]);
});

// Route ke Controller (dipakai lagi di P4 tanpa ubah)
Route::get('/tasks', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}', [TaskController::class, 'show']);
Route::post('/tasks/{id}', [TaskController::class, 'show']); // versi mentor
