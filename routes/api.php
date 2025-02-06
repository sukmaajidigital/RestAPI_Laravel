<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum']);
Route::get('/me', [AuthController::class, 'me'])->middleware(['auth:sanctum']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/post', [PostController::class, 'index']);
    Route::get('/post/me', [PostController::class, 'indexme']);
    Route::get('/post/{id}', [PostController::class, 'showpost']);
    Route::post('/post', [PostController::class, 'store']);
    Route::patch('/post/{id}', [PostController::class, 'update'])->middleware(['aksespost']);
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->middleware(['aksespost']);

    Route::get('/user', [User::class, 'all']);
});
